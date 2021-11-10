<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Color extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'color';
    protected $fillable = [
        'colorId',
        'name',
        'code',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'productId', 'colorId');
    }
}
