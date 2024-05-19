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

class OrderService extends Service
{
    public function orderCartProduct($request){
        try {
            $orderType = $request['orderType'] ?? 'orderType';
            if(($orderType === 'buynow') && $request['email'] != ''){ 
                /* Save delivery address */ 
                $address = new Address();
                $address->user_id = Auth::user()->id ?? '1';
                $address->name = $request['name'] ?? '';
                $address->email = $request['email'] ?? '';
                $address->address = $request['address'] ?? '';
                $address->state = $request['state'] ?? '';
                $address->country = $request['country'] ?? '';
                $address->zipcode = $request['zipcode'] ?? '';
                $address->save();

                $order = new Order();
                $order->user_id = Auth::user()->id ?? '1';
                $order->product_id  = $request['products']['id'];
                $order->delivery_address_id = $address->id;
                $order->total_price = $request['products']['amount'] ?? '';
                $order->payment_type = $request['payment_type'] ?? '';
                $order->payment_status = 'pending';
                $order->order_status = 'pending';
                $order->save();
    
                if($order){
                    return true;
                }          
            }elseif(isset($request['products']) && $request['email'] != ''){
                $cart = new Cart();
                $cart->user_id = Auth::user()->id ?? '1';   /* 1 is passing only for test purpose! */
                $cart->save();
            
                /* Save each product in the cart */
                foreach($request['products'] as $cartItem){
                    $data = new CartItem();
                    $data->cart_id = $cart->id;
                    $data->product_id  = $cartItem['id'];
                    $data->save();
                }
                
                /* Save delivery address */ 
                $address = new Address();
                $address->user_id = Auth::user()->id ?? '1';
                $address->name = $request['name'] ?? '';
                $address->email = $request['email'] ?? '';
                $address->address = $request['address'] ?? '';
                $address->state = $request['state'] ?? '';
                $address->country = $request['country'] ?? '';
                $address->zipcode = $request['zipcode'] ?? '';
                $address->save();

                $order = new Order();
                $order->user_id = Auth::user()->id ?? '1';
                $order->cart_id = $cart->id;
                $order->delivery_address_id = $address->id;
                $order->total_price = $request['amount'] ?? '';
                $order->payment_type = $request['payment_type'] ?? '';
                $order->payment_status = 'pending';
                $order->order_status = 'pending';
                $order->save();
    
                if($order){
                    return true;
                }
            }else{
                return  false;
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
}