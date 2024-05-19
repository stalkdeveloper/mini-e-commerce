<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       try {
            $product = Product::where('is_available', '1')->orderBy('id', 'desc')->take(12)->get();
            return view('home',compact('product'));
       } catch (\Throwable $e) {
            \Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
       }
    }
}
