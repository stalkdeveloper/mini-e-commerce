<?php

namespace App\Services\Admin;

use App\Services\Service;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Auth;

class ProductService extends Service
{
    public function productAll(){
        try {
            $data = Product::orderBy('id', 'desc')->paginate(10, ['*'], 'product');
            return $data;
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function productStore($request){
        try {
            $data = new Product;
            $data->user_id  = Auth::user()->id;
            $data->category_id  = $request['category'];
            $data->name = $request['name'];
            $data->description  = $request['description'];
            // $data->image = $request['image'];
            $data->price = $request['price'];
            $data->size = $request['size'];
            $data->is_available = '0';
    
            if($data->save()){
               return true;
            }
            return false;
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function productView($id){
        try {
            $data = Product::where('id', $id)->first();
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function productUpdate($request){
        try {
            $data = [
                'user_id'  => Auth::user()->id,
                'category_id'  => $request['category'],
                'description' => $request['image'],
                'image'  => $request['image'],
                'price' => $request['price'],
                'size' => $request['size'],
            ]; 
            $update = Product::where('id', $request['id'])->update($data);
    
            if($update){
                return true;
            }
            return false;
        } catch (\Throwable $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
    public function productDelete($request){
        try {
            $data = Product::where('id', $request['id'])->first();
            if($data->delete()){
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}