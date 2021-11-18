<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class HomeController extends Controller
{
    public function index(){
        $newProduct = Product::all()->sortByDesc('createdAt')->take(5);
        $discountProduct = Product::all()->sortByDesc('discount')->take(5);
        return view('index',compact('newProduct','discountProduct'));
    }
}
