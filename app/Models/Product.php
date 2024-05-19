<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $primarykey = "id";
    protected $foreignkey = [
        "user_id",
        "category_id",
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'image',
        'price',
        'size',
        'is_available',
    ];
}
