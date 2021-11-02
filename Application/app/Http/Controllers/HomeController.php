<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index(){
        $newProduct = Product::all()->sortBy('createdAt')->take(5);
        $saleProduct = Product::all()->sortBy('createdAt')->take(5);
        return view('index',compact('newProduct','saleProduct'));
    }
}
