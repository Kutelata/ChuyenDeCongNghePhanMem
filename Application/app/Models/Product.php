<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use Notifiable;
    use Sortable;

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

    public $sortable = [
        'name',
        'price'
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
