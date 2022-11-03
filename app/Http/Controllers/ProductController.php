<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    public function addDummyData(){
        try{
            $found = Product::find(1);
            dd($found->name);
            // Product::create([
            //     'name' => 'Heinz No Added Sugar Beanz in Tomato Sauce',
            //     'description' => 'In a rich tomato sauce. At least 25% less salt than standard Heinz baked beans. No Artificial Sweeteners. No Added Sugar - Contains naturally occurring sugars.',
            //     'price' => '£2.00',
            //     'categories' => 'Tinned Food',
            //     'url' => 'https://assets.sainsburys-groceries.co.uk/gol/7173123/1/640x640.jpg'
            // ]);
        }catch(QueryException $exception){
            dd($exception);
        }

        dd('Success!');
    }
}
