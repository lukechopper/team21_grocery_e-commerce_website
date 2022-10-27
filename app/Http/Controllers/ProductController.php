<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    public function addDummyData(){
        try{
            // Product::create([
            //     'name' => 'Heinz No Added Sugar Beanz in Tomato Sauce',
            //     'description' => 'In a rich tomato sauce. At least 25% less salt than standard Heinz baked beans. No Artificial Sweeteners. No Added Sugar - Contains naturally occurring sugars.',
            //     'price' => '£2.00',
            //     'categories' => 'Tinned Food',
            //     'url' => 'https://ui.assets-asda.com/dm/asdagroceries/5000157078766_T1?defaultImage=asdagroceries/noImage&resMode=sharp2&id=CE2r60&fmt=jpg&dpr=off&fit=constrain,1&wid=288&hei=288'
            // ]);
        }catch(QueryException $exception){
            dd('Fail!');
        }

        dd('Success!');
    }
}
