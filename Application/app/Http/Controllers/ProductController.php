<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    public function product_list(Request $request)
    {
        $categoryId = $request->categoryId;
        $brandId = $request->brandId;
        $colorId = $request->colorId;
        if ($categoryId == null) {
            $product = Product::paginate(10);
        } else {
            if ($brandId != null) {
                $product = Product::where('categoryId', '=', $categoryId)->where('brandId', '=', $brandId)->paginate(10);
            }elseif ($colorId != null) {
                $product = Product::where('categoryId', '=', $categoryId)->where('colorId', '=', $colorId)->paginate(10);
            }else{
                $product = Product::where('categoryId', '=', $categoryId)->paginate(10);
            }
        }

        $size = Size::all();
        return view('product_list',compact('product','size'));
    }

    public function product_detail()
    {
        return view('product_detail');
    }
}
