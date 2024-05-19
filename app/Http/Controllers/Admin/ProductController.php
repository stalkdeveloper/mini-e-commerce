<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->ProductService = $productService;
    }

    public function allProduct(Request $request){
        try {
            $product = $this->ProductService->productAll();
            return view('admin.product.index')->with(compact('product'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function createProduct(Request $request){
        try {
            // $company = Company::orderBy('id', 'desc')->get();
            // return view('admin.product.create')->with(compact('company'));
            return view('admin.product.create');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function storeProduct(Request $request){
        try {
            $input = $request->all();
            $productValidator = new ProductValidator('add');

            if (!$productValidator->with($input)->passes()) {
                return response()->json(['status'=>false,'error'=>$productValidator->getErrors()[0]]);
            }

            $store = $this->ProductService->productStore($input);
            if($store){
                return response()->json(['status'=>true,'message'=>'Successfully, Added Product..!!']);
            }
                return response()->json(['status'=>false,'error'=>'Sorry, Unable to add..!!']);
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }

    public function viewProduct($id){
        try {
            $data = $this->ProductService->productView($id);
            return view('admin.product.edit')->with(compact('data', 'company'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateProduct(Request $request){
        try {
            $input = $request->all();
            $productValidator = new ProductValidator('update');

            if (!$productValidator->with($input)->passes()) {
                return response()->json(['status'=>false,'error'=>$productValidator->getErrors()[0]]);
            }
    
            $update = $this->ProductService->productUpdate($input);

            if($update){
                return response()->json(['status'=>true,'message'=>'Successfully, Updated Product..!!']);
            }
            return response()->json(['status'=>false,'error'=>'Sorry, Unable to update..!!']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function deleteProduct(Request $request){
        try {
            $delete = $this->ProductService->productDelete($request);

            if($delete){
                return response()->json(['status'=>true,'message'=>'Successfully, Deleted Product..!!']);
            }
                return response()->json(['status'=>false,'error'=>'Sorry, Unable to delete..!!']);
        }catch (\Exception $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }
    }
}
