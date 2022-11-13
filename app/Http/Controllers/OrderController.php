<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class OrderController extends Controller
{
    //NOT DIRECTLY RELATED TO ANY ROUTES
    public function getOrdersAlreadyPurchased(){
        $userOrders = auth()->user()->orders;
        $ordersAlreadyPurchased = array();
        foreach($userOrders as $order){
            if(isset($order->whenPurchased)){ array_push($ordersAlreadyPurchased, $order); }
        }

        return $ordersAlreadyPurchased;
    }

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

        if(auth()->user()->isAdmin) return redirect()->route('home');

        if(!count($ordersCurrentlyInBasket)){
            if(empty(session('success')) && empty(session('error'))){
                return redirect()->route('home');
            }
        }

        return view('basket', ['bOrders' => $ordersCurrentlyInBasket]);
    }

    public function viewPastOrders(){
        $ordersAlreadyPurchased = $this->getOrdersAlreadyPurchased();

        if(!count($ordersAlreadyPurchased) || auth()->user()->isAdmin){
            return redirect()->route('home');
        }

        $formattedPurchasedOrders = array();
        $formattedIter = array();
        $pastPurchased = null;
        $currPurchased = null;
        $iter = 0;

        foreach($ordersAlreadyPurchased as $orderAP){
            $currPurchased = $orderAP->whenPurchased;
            if($currPurchased !== $pastPurchased && $iter > 0){
                array_push($formattedPurchasedOrders, $formattedIter);
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

        array_push($formattedPurchasedOrders, $formattedIter);

        return view('pastOrders', ['pOrders' => $formattedPurchasedOrders]);
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

        //Check that there is aleady the same product waiting in the basket
        $prodAlrInBasket = Order::where('user_id', auth()->id())
                                        ->whereNull('whenPurchased')
                                        ->where('product_id', $request->product_id)
                                        ->first();

        if(isset($prodAlrInBasket)){
            try{
                $prodAlrInBasket->amount += (int)$request->amount;
                $newPrice = (float)$prodAlrInBasket->price + (float)$request->total;
                $prodAlrInBasket->price = number_format($newPrice, 2, '.', '');
                $prodAlrInBasket->save();
            }catch(QueryException $exception){
                return back()->with('error', 'true');
            }
        }else{
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
