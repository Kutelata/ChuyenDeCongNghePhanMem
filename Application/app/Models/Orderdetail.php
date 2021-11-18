<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Orderdetail extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'orderdetail';
    protected $fillable = [
        'orderId',
        'productId',
        'productName',
        'productPrice',
        'quantity'
    ];
    public function product(){
        return  $this->belongsTo(Product::class,'productId','productId');
    }
    public function user(){
        return $this->belongsTo(User::class,'userId','userId');

    }
}
