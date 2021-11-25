<?php
namespace App;
class Cart{
    public $products=null;
    public $totalPrice=0;
    public $totalQuantity=0;
    public $size2=0;

    public function __construct($cart){
        if($cart){
            $this->products=$cart->products;
            $this->totalPrice=$cart->totalPrice;
            $this->totalQuantity=$cart->totalQuantity;
            $this->size2=$cart->size2;

        }
    }
    public function AddCart($product,$id,$size){
        $newProduct=['quantity'=>0,'price'=>$product->price,'productInfo'=>$product,'size'=>$size->number];
        if($this->products){
            if(array_key_exists($id,$this->products)&& in_array($size->number,$newProduct,'true')){
                $newProduct=$this->products[$id];
//                this->products[$id]->size=$size->number;
            }
//             if(array_key_exists($id,$this->products)&&$this->size2!=$size->number){;
////                $newProduct=$this->products[count($this->products)+2];
//                $this->products[count($this->products)+2]=$newProduct;
//                $this->size2=$size->number;
//            }
        }
//        dd(count($this->products));
        $newProduct['quantity']++;
        $newProduct['price']=$newProduct['quantity']*$product->price;
        $this->products[$id]=$newProduct;
        $this->totalPrice+=$product->price;
        $this->size2=$size->number;
        $this->totalQuantity++;
    }
    public function DeleteItemCart($id){
        $this->totalQuantity-=$this->products[$id]['quantity'];
        $this->totalPrice-=$this->products[$id]['price'];
        unset($this->products[$id]);

    }
    public function UpdateItemCart($id,$quantity){
        $this->totalQuantity-=$this->products[$id]['quantity'];
        $this->totalPrice-=$this->products[$id]['price'];

        $this->products[$id]['quantity']=$quantity;
        $this->products[$id]['price']=$quantity* $this->products[$id]['productInfo']->price;

        $this->totalQuantity+=$this->products[$id]['quantity'];
        $this->totalPrice+=$this->products[$id]['price'];
    }
}
