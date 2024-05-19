<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $primarykey = "id";
    protected $foreignkey = [
        "user_id",
        "product_id",
    ];

    protected $fillable = [
        'user_id',
        'product_id',
        'cart_id',
        'delivery_address_id',
        'total_price',
        'payment_type',
        'payment_status',
        'order_status',
    ];
}
