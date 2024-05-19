<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cart';

    protected $primarykey = "id";
    protected $foreignkey = [
        "user_id",
    ];

    protected $fillable = [
        'user_id'
    ];
}
