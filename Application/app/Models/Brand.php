<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Brand extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'brand';
    protected $fillable = [
        'brandId',
        'name',
        'description',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'productId', 'brandId');
    }
}
