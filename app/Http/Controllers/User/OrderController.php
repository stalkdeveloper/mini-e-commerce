<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Validators\User\OrderValidator;
use App\Services\User\OrderService;
use Auth;

class OrderController extends Controller
{
    
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->OrderService = $orderService;
    }

    public function addToCartToCofirmOrder(Request $request){
        try {
            $input = $request->all();
            $orderValidator = new OrderValidator('add');

            if (!$orderValidator->with($input)->passes()) {
                return response()->json(['status'=>false,'error'=>$orderValidator->getErrors()[0]]);
            }
                
            $order = $this->OrderService->orderCartProduct($input);            
    
            if($order){
                return response()->json(['status'=>true, 'message'=>'Successfully, Order has been done on Cash On Delivery mode..!!', 'payment_type' => $input['payment_type']]);
            }
                return response()->json(['status'=>false, 'error'=>'Sorry, Unable to order..!!']);
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function confirmOrder(Request $request){
        try {
            \Log::info($request);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
