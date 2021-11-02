<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_list(){
        $product = Product::paginate(5);
        return view('product_list',compact('product'));
    }

    public function product_detail(){
        return view('product_detail');
    }
}
