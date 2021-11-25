<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;
use Monolog\Handler\CouchDBHandler;


class ProductController extends Controller
{
    public function product_list(Request $request)
    {
        if ($request->categoryId != null) {
            $categoryId = array_map('intval', explode(",", $request->categoryId));
            if (count($categoryId) == 1 && in_array(1, $categoryId)) {
                $categoryId = 1;
            }
        } else {
            $categoryId = 1;
        }

        if ($request->brandId != null) {
            $brandId = array_map('intval', explode(",", $request->brandId));
        } else {
            $brandId = null;
        }

        if ($request->colorId != null) {
            $colorId = array_map('intval', explode(",", $request->colorId));
        } else {
            $colorId = null;
        }

        $productId = [];
        if ($request->sizeId != null) {
            $sizeId = array_map('intval', explode(",", $request->sizeId));
            $productIdBySize = ProductSize::select('productId')->whereIn('sizeId', $sizeId)->groupby('productId')->get();
            foreach ($productIdBySize as $pibs) {
                $productId[] = ($pibs->productId);
            }
        } else {
            $sizeId = null;
        }

        $orderBy = $request->orderBy;
        $sortOrder = $request->sortOrder;

        if (!$orderBy) {
            $orderBy = 'name';
        }
        if (!$sortOrder) {
            $sortOrder = 'ASC';
        }
        if ($categoryId == 1) {
            if ($brandId != null) {
                if ($colorId != null) {
                    if ($sizeId != null) {
                        $product = Product::where('categoryId', '!=', 0)->whereIn('brandId', $brandId)->whereIn('colorId', $colorId)->whereIn('productId', $productId);
                    } else {
                        $product = Product::where('categoryId', '!=', 0)->whereIn('brandId', $brandId)->whereIn('colorId', $colorId);
                    }
                } else {
                    $product = Product::where('categoryId', '!=', 0)->whereIn('brandId', $brandId);
                }
            } elseif ($colorId != null) {
                if ($sizeId != null) {
                    $product = Product::where('categoryId', '!=', 0)->whereIn('colorId', $colorId)->whereIn('productId', $productId);
                } else {
                    $product = Product::where('categoryId', '!=', 0)->whereIn('colorId', $colorId);
                }
            } elseif ($sizeId != null) {
                if ($brandId != null) {
                    $product = Product::where('categoryId', '!=', 0)->whereIn('productId', $productId)->whereIn('brandId', $brandId);
                } else {
                    $product = Product::where('categoryId', '!=', 0)->whereIn('productId', $productId);
                }
            } else {
                $product = Product::where('categoryId', '!=', 0);
            }
        } else {
            if ($brandId != null) {
                if ($colorId != null) {
                    if ($sizeId != null) {
                        $product = Product::where('categoryId', '=', $categoryId)->whereIn('brandId', $brandId)->whereIn('colorId', $colorId)->whereIn('productId', $productId);
                    } else {
                        $product = Product::where('categoryId', '=', $categoryId)->whereIn('brandId', $brandId)->whereIn('colorId', $colorId);
                    }
                } else {
                    $product = Product::where('categoryId', '=', $categoryId)->whereIn('brandId', $brandId);
                }
            } elseif ($colorId != null) {
                if ($sizeId != null) {
                    $product = Product::where('categoryId', '=', $categoryId)->whereIn('colorId', $colorId)->whereIn('productId', $productId);
                } else {
                    $product = Product::where('categoryId', '=', $categoryId)->whereIn('colorId', $colorId);
                }
            } elseif ($sizeId != null) {
                if ($brandId != null) {
                    $product = Product::where('categoryId', '=', $categoryId)->whereIn('productId', $productId)->whereIn('brandId', $brandId);
                } else {
                    $product = Product::where('categoryId', '=', $categoryId)->whereIn('productId', $productId);
                }
            } else {
                $product = Product::where('categoryId', '!=', 0);
            }
        }
        $product = $product->orderBy($orderBy, $sortOrder)->paginate(10);
        return view('product_list', compact('product'));
    }

    public function AddCart(Request $request, $id, $sizeId)
    {
        $product = Product::where('productId', '=', $id)->first();
        $size = DB::table('productsize as ps')->select('s.number', 's.sizeId')
            ->join('size as s', 'ps.sizeId', '=', 's.sizeId')
            ->where('ps.productId', '=', $id)->where('s.sizeId', '=', $sizeId)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id, $size);
            $request->session()->put('Cart', $newCart);
        }
        return view('cartajax');
    }

    public function DeleteItemCart(Request $request, $id)
    {

        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (Count($newCart->products) > 0) {
            $request->session()->put('Cart', $newCart);
        } else {
            $request->session()->forget('Cart');
        }

        return view('cartajax');
    }

    public function ViewListCart()
    {
        return view('Cart');
    }

    public function DeleteListItemCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (Count($newCart->products) > 0) {
            $request->session()->put('Cart', $newCart);
        } else {
            $request->session()->forget('Cart');

        }
        return view('list-cart');
    }

    public function SaveListItemCart(Request $request, $id, $quantity)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quantity);
        $request->session()->put('Cart', $newCart);
        return view('list-cart');
    }

    public function Checkout()
    {
        if (Session('user') == null) {
            return redirect()->route('login')->with('error', 'You have to login first!');
        }
        return view('checkout');
    }

    public function post_checkout(Request $request)
    {
        foreach (session('Cart')->products as $c) {
            $number = DB::table('size')->select('sizeId')->where('number', '=', intval($c['size']))->first();
            $quantity = DB::table('productsize')->select('quantity')->where('sizeId', '=', $number->sizeId)
                ->where('productId', '=', intval($c['productInfo']->productId))->first();
            $result3 = [
                'quantity' => $quantity->quantity - intval($c['quantity']),
            ];
            ProductSize::where("productId", $c['productInfo']->productId)->where("sizeId", $number->sizeId)->update($result3);
        }
        $result = [
            'total' => $request['total'],
            'orderDate' => date('Y-m-d H:i:s'),
            'userId' => $request['userId'],
            'fullname' => $request['fullname'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'notes' => $request['notes']
        ];
        $order = Order::create($result);
        $orderid = $order->id;
        foreach (session('Cart')->products as $c) {
            $result2 = [
                'orderId' => $orderid,
                'productId' => $c['productInfo']->productId,
                'productName' => $c['productInfo']->name,
                'productPrice' => $c['productInfo']->price,
                'quantity' => $c['quantity']
            ];
            $orderdone = Orderdetail::create($result2);
        }
        session()->forget('Cart');
        return redirect()->route('index')->with('message', 'Order succeed!Thank you for shopping with us');
    }

    public function showCart()
    {
        echo "<pre>";
        print_r(session()->get('cart'));
    }

    public function ProductFilter(Request $request)
    {
        $checked = $request->filterbrand;
        if ($checked == null) {
            return redirect()->route('product_list');
        } else {
            $product = Product::where('brandId', '=', $checked)->paginate(10);
        }
        return view('product_list', compact('product', 'checked'));
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
            $psize = DB::table('productsize as ps')->select('s.sizeId as sizeId', 's.number as number')
                ->join('size as s', 'ps.sizeId', '=', 's.sizeId')
                ->where('ps.productId', '=', $request->productId)->get();
            $product = Product::where('productId', '=', $request->productId)->first();
            $discountProduct = Product::all()->sortByDesc('discount')->take(5);
            return view('product_detail', compact('product', 'psize', 'discountProduct'));
        } else {
            return redirect()->back();
        }
    }
}
