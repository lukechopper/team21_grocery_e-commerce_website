<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //

    public function makeOrder(Request $request){
        if(!$request->isMethod('post')){
            return redirect()->route('home');
        }

        dd($request->total);
    }
}
