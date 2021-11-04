<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_list(){
        $product = Product::paginate(10);
        $size = Size::all();
        return view('product_list',compact('product','size'));
    }

    public function product_detail(){
        return view('product_detail');
    }
}
