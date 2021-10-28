<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'product';
    protected $fillable = [
        'productId',
        'name',
        'price',
        'description',
        'image',
        'categoryId',
        'brandId',
    ];
}
