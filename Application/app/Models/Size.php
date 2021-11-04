<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Size extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'color';
    protected $fillable = [
        'sizeId',
        'number',
    ];
}
