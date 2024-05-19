<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cartitems';

    protected $primarykey = "id";
    protected $foreignkey = [
        "cart_id",
        "product_id",
    ];

    protected $fillable = [
        'cart_id',
        'product_id',
        'status'
    ];
}
