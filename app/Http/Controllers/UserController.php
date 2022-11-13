<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use App\Models\User;
use App\Models\Product;

class UserController extends Controller
{
    //

    public function preventUnLoggedInUserFromReachingTheRouteUnlessTheyHaveJustBeenFlashedTheRelevantSessionVariables($viewName){
        if (!empty(session('error')) ||  !empty(session('success'))) {
            return view($viewName);
        }
        if(auth()->user()){
            return redirect()->route('home');
        }
        return view($viewName);
    }

    public function accessLogin(){
        $returnVal = $this->preventUnLoggedInUserFromReachingTheRouteUnlessTheyHaveJustBeenFlashedTheRelevantSessionVariables('login');
        return $returnVal;
    }

    public function accessSignup(){
        $returnVal = $this->preventUnLoggedInUserFromReachingTheRouteUnlessTheyHaveJustBeenFlashedTheRelevantSessionVariables('Signup');
        return $returnVal;
    }

    public function signup(Request $request){
        if(!$request->isMethod('post')){
            return redirect()->route('home');
        }
        $request->validate([
            'username' => 'required|unique:users|max:255|alpha_dash',
            'email' => 'required|email|unique:users|max:255',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ]
        ]);
        try{
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }catch(QueryException $exception){
            return back()->with('error', 'true');
        }

        return back()->with('success', 'true');
    }

    public function login(Request $request){
        if(!$request->isMethod('post')){
            return redirect()->route('home');
        }
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('error', 'true')->with('email', $request->email);
        }
        return back()->with('success', 'true');
    }

    public function logout(){
        if(!auth()->user()){
            return redirect()->route('home');
        }
        auth()->logout();
        return view('logout');
    }

    public function viewAdminInfo(){
        if(!auth()->user()->isAdmin) return redirect()->route('home');

        $allCustomers = User::where('isAdmin', 0)->get(); //WILL BE PASSED INTO VIEW
        $allProducts = Product::all(); //WILL BE PASSED INTO VIEW

        //ONE BIG ARRAY of all the orders already purchased (i.e., currently placed) with respect to the customers.
        $allOrdersCurrentlyPlaced = array();
        foreach($allCustomers as $customer){
            $customerOrders = $customer->orders;
            foreach($customerOrders as $cOrder){
                if(isset($cOrder->whenPurchased)){ array_push($allOrdersCurrentlyPlaced, $cOrder); }
            }
        }

        $formattedOrdersAlreadyPlaced = array(); //WILL BE PASSED INTO VIEW
        $formattedIter = array();
        $pastPurchased = null;
        $currPurchased = null;
        $iter = 0;

        foreach($allOrdersCurrentlyPlaced as $orderAP){
            $currPurchased = $orderAP->whenPurchased;
            if($currPurchased !== $pastPurchased && $iter > 0){
                array_push($formattedOrdersAlreadyPlaced, $formattedIter);
                $formattedIter = array();
            }

            !isset($formattedIter['desc']) ? $formattedIter['desc'] = $orderAP->product->name . ' (x' . $orderAP->amount . ')' : $formattedIter['desc'] .= ', ' . $orderAP->product->name . ' (x' . $orderAP->amount . ')';
            !isset($formattedIter['price']) ? $formattedIter['price'] = (float)$orderAP->price : $formattedIter['price'] += (float)$orderAP->price;
            !isset($formattedIter['address']) ? $formattedIter['address'] = $orderAP->address : null;
            !isset($formattedIter['first_name']) ? $formattedIter['first_name'] = $orderAP->first_name : null;
            !isset($formattedIter['last_name']) ? $formattedIter['last_name'] = $orderAP->last_name : null;
            !isset($formattedIter['phone_number']) ? $formattedIter['phone_number'] = $orderAP->phone_number : null;

            $pastPurchased = $currPurchased;
            $iter++;
        }

        count($formattedIter) ? array_push($formattedOrdersAlreadyPlaced, $formattedIter) : null;

        return view('adminInfo', ['customers' => $allCustomers, 'apOrders' => $formattedOrdersAlreadyPlaced, 'products' => $allProducts]);
    }
}
