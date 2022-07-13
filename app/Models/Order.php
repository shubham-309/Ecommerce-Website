<?php

namespace App\Models;
use App\Models\Orderitem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'total_price',
        'payment_mode',
        'payment_id',
        'status',
        'message',
    ];

    public function orderitems()
    {
        return $this->hasMany(Orderitem::class);
    }
}
