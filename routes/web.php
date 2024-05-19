<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Admin\DashBoardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return view('admin.auth.login');
//     // return view('admin.auth.registration');
//     // return view('admin.dashboard.dashboard');
//     return redirect()->route('home');
// });

Auth::routes();
Route::get('/admin/dashboard', [DashBoardController::class, 'dashboard'])->name('admin_dashboard');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/add-to-cart', [OrderController::class,'addToCartToCofirmOrder'])->name('getAddToCart');
Route::post('/confirm-order', [OrderController::class,'confirmOrder'])->name('getConfirmOrder');

/* For User Product */
Route::get('/products', [ProductController::class,'allProduct'])->name('getAllProduct');

// Route::middleware(['auth'])->group(function () {
//     Route::group(['prefix'=>'admin'],function(){
//         Route::get('/dashboard', [DashBoardController::class, 'dashboard'])->name('dashboard');
//     });
// });

