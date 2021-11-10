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

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'categoryId');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandId', 'brandId');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'colorId', 'colorId');
    }
}
