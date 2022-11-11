<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class OrderController extends Controller
{

    //NOT DIRECTLY RELATED TO ANY ROUTES
    public function getOrdersCurrentlyInBasket(){
        $userOrders = auth()->user()->orders;
        $ordersCurrentlyInBasket = array();
        foreach($userOrders as $order){
            if(!isset($order->whenPurchased)){ array_push($ordersCurrentlyInBasket, $order); }
        }

        return $ordersCurrentlyInBasket;
    }

    public function viewBasket(){

        $ordersCurrentlyInBasket = $this->getOrdersCurrentlyInBasket();

        if(!count($ordersCurrentlyInBasket) || auth()->user()->isAdmin){
            if(empty(session('success')) && empty(session('error'))){
                return redirect()->route('home');
            }
        }

        return view('basket', ['bOrders' => $ordersCurrentlyInBasket]);
    }

    public function deleteFromBasket(Request $request){

        Order::find($request->order_id)->delete();

        $ordersCurrentlyInBasket = $this->getOrdersCurrentlyInBasket();

        if(!count($ordersCurrentlyInBasket) || auth()->user()->isAdmin){
            return redirect()->route('home');
        }

        return back();
    }

    public function makeOrder(Request $request){
        if(!$request->isMethod('post')){
            return redirect()->route('home');
        }

        try{
            Order::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'address' => 'N/A',
                'amount' => $request->amount,
                'price' => $request->total
            ]);
        }catch(QueryException $exception){
            return back()->with('error', 'true');
        }

        return back()->with('success', 'true');
    }

    public function makePurchase(Request $request){
        if(!$request->isMethod('post')){
            return redirect()->route('home');
        }

        $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'address' => 'required|regex:/(^[a-zA-Z0-9 ]+$)+/i',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        $indivOrderIds = explode(",", $request->order_ids);

        try{
            foreach($indivOrderIds as $indivOrderId){
                $selectInfo = Order::find(trim($indivOrderId));
                $selectInfo->address = $request->address;
                $selectInfo->first_name = $request->first_name;
                $selectInfo->last_name = $request->last_name;
                $selectInfo->phone_number = $request->phone_number;
                $selectInfo->whenPurchased = Carbon::now()->toDateTimeString();
                $selectInfo->save();
            }
        }catch(QueryException $exception){
            return back()->with('error', 'true');
        }

        return back()->with('success', 'true');
    }
}
