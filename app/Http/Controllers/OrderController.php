<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    //

    public function makeOrder(Request $request){
        if(!$request->isMethod('post')){
            return redirect()->route('home');
        }
        // $current_date_time = Carbon::now()->toDateTimeString();
        // dd($current_date_time);
        dd($request->total);
    }
}
