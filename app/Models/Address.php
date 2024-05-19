<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'address';

    protected $primarykey = "id";
    protected $foreignkey = [
        "user_id",
    ];

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'zipcode',
        'state',
        'country'
    ];
}
