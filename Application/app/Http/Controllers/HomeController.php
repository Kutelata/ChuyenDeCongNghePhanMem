<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index(){
        $product = Product::all();
        //print_r($product);
        return view('index',compact('product'));
    }
}
