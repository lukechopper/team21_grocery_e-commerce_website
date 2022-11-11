<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class OrderController extends Controller
{
    //

    public function viewBasket(){
        $userOrders = auth()->user()->orders;
        $ordersCurrentlyInBasket = array();
        foreach($userOrders as $order){
            if(!isset($order->whenPurchased)){ array_push($ordersCurrentlyInBasket, $order); }
        }

        if(!count($ordersCurrentlyInBasket) || auth()->user()->isAdmin){
            return redirect()->route('home');
        }

        return view('basket', ['bOrders' => $ordersCurrentlyInBasket]);
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
        // $current_date_time = Carbon::now()->toDateTimeString();
        // dd($current_date_time);
    }
}
