<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class ProductSize extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'productsize';
    protected $fillable = [
        'productId',
        'sizeId',
        'quantity',
    ];

    public function size()
    {
        return $this->belongsTo(Size::class, 'sizeId', 'sizeId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'productId');
    }
}
