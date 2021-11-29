<?php

namespace App;
class Cart
{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public $size2 = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
            $this->size2 = $cart->size2;
        }
    }

    public function AddCart($product, $id, $size)
    {
        $array_id = strval($id) . strval($size->sizeId);
        $newProduct = ['quantity' => 0, 'price' => $product->price, 'productInfo' => $product, 'size' => $size->number, 'sizeId' => $size->sizeId];
        if ($this->products) {
            if (array_key_exists($array_id, $this->products)) {
                $newProduct = $this->products[$array_id];
            }
        }
        $newProduct['quantity']++;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        $this->products[$array_id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuantity++;
    }

    public function DeleteItemCart($array_id)
    {
        $this->totalQuantity -= $this->products[$array_id]['quantity'];
        $this->totalPrice -= $this->products[$array_id]['price'];
        unset($this->products[$array_id]);
    }

    public function UpdateItemCart($array_id, $quantity)
    {
        $this->totalQuantity -= $this->products[$array_id]['quantity'];
        $this->totalPrice -= $this->products[$array_id]['price'];

        $this->products[$array_id]['quantity'] = $quantity;
        $this->products[$array_id]['price'] = $quantity * $this->products[$array_id]['productInfo']->price;

        $this->totalQuantity += $this->products[$array_id]['quantity'];
        $this->totalPrice += $this->products[$array_id]['price'];
    }
}
