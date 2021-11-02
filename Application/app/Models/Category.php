<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'category';
    protected $fillable = [
        'categoryId',
        'name',
        'description',
    ];

    public function product()
    {
        return $this->hasMany(Product, 'productId', 'categoryId');
    }
}
