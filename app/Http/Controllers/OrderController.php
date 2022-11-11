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
        dd('Basket');
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
