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
            } elseif ($colorId != null) {
                $product = Product::where('categoryId', '=', $categoryId)->where('colorId', '=', $colorId)->paginate(10);
            } else {
                $product = Product::where('categoryId', '=', $categoryId)->paginate(10);
            }
        }
        return view('product_list', compact('product'));
    }

    public function searchProductByName(Request $request)
    {
        $productName = $request->productName;
        if ($productName != null) {
            $product = Product::where('name', 'LIKE', '%' . $productName . '%');
            if ($product->count() > 0) {
                $product = $product->paginate(10);
            }
        } else {
            $product = Product::paginate(10);
        }
        return view('search', compact('product', 'productName'));
    }

    public function product_detail(Request $request)
    {
        if ($request->productId != null){
            $product = Product::where('productId','=',$request->productId)->first();
            return view('product_detail',compact('product'));
        }else{
            return redirect()->back();
        }
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view ('checkout');
    }
}
