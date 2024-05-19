<?php

namespace App\Services\User;

use App\Services\Service;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Address;
use App\Models\Order;
use Auth;

class ProductService extends Service
{
    public function productList($request){
        try {
            $product = Product::where('is_available', '1')->orderBy('id', 'desc')->paginate(10, ['*'], 'products');
            return $product;
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
}