<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewOrder extends Model
{
    use HasFactory;

    protected $table = 'new_orders';

    protected $fillable = [
        'user_id',
        'username',
        'address',
        'total_price',
        'payment_method',
        'products',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }

}
