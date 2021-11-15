<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    public function product_list(Request $request)
    {
        $categoryId = $request->categoryId;
        $brandId = $request->brandId;
        $colorId = $request->colorId;
        $orderBy = $request->orderBy;
        $sortOrder = $request->sortOrder;

        if (!$orderBy) {
            $orderBy = 'name';
        }
        if (!$sortOrder) {
            $sortOrder = 'ASC';
        }
//        $product = Product::all();
//        foreach ($categoryId as $cId){
//            $product->where('categoryId', '=', $cId);
//        }
//        $product->orderBy($orderBy, $sortOrder)->paginate(10);

//        if ($categoryId == 1) {
//            if($brandId != null){
//                $product = Product::where('categoryId', '!=', 0)->where('brandId', '=', $brandId)->orderBy($orderBy, $sortOrder)->paginate(10);
//            }else{
//                $product = Product::where('categoryId', '!=', 0)->orderBy($orderBy, $sortOrder)->paginate(10);
//            }
//        } else {
//            if ($brandId != null) {
//                $product = Product::where('categoryId', '=', $categoryId)->where('brandId', '=', $brandId)->orderBy($orderBy, $sortOrder)->paginate(10);
//            } elseif ($colorId != null) {
//                $product = Product::where('categoryId', '=', $categoryId)->where('colorId', '=', $colorId)->orderBy($orderBy, $sortOrder)->paginate(10);
//            } else {
//                $product = Product::where('categoryId', '=', $categoryId)->orderBy($orderBy, $sortOrder)->paginate(10);
//            }
//        }

        dd(explode(",",$request->categoryId));
//        return view('product_list', compact('product'));
    }

    public function searchProductByName(Request $request)
    {
        $searchName = $request->searchName;
        if ($searchName != null) {
            $product = DB::table('product as p')
                ->select('p.*', 'c.name as categoryName', 'b.name as brandName')
                ->join('category as c', 'c.categoryId', '=', 'p.categoryId')
                ->join('brand as b', 'b.brandId', '=', 'p.brandId')
                ->where('c.name', 'LIKE', '%' . $searchName . '%')
                ->orwhere('b.name', 'LIKE', '%' . $searchName . '%')
                ->orwhere('p.name', 'LIKE', '%' . $searchName . '%');
            if ($product->count() > 0) {
                $product = $product->paginate(10);
            }
        } else {
            $product = Product::paginate(10);
        }
        return view('search', compact('product', 'searchName'));
    }

    public function product_detail(Request $request)
    {
        if ($request->productId != null) {
            $product = Product::where('productId', '=', $request->productId)->first();
            return view('product_detail', compact('product'));
        } else {
            return redirect()->back();
        }
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }
}
