<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'order';
    protected $fillable = [
        'oderId',
        'total',
        'orderDate',
        'userId',
    ];
    public function user(){
        return $this->belongsTo(User::class,'userId','userId');

    }
}
