<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

route::get('',[HomeController::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//ADMIN
route::post('/add_category',[AdminController::class,'add_category']);
route::get('/show_product',[AdminController::class,'show_product']);
route::get('/order',[AdminController::class,'order']);
route::get('/delivered/{id}',[AdminController::class,'delivered']);
route::get('/pront_pdf/{id}',[AdminController::class,'pront_pdf']);
route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
route::get('/update_product/{id}',[AdminController::class,'update_product']);
route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']); //post because we are updating
route::get('/view_category',[AdminController::class,'view_category']);
route::get('/view_product',[AdminController::class,'view_product']);
route::post('/add_product',[AdminController::class,'add_product']);
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);


//HOME
route::get('redirect',[HomeController::class,'redirect']);//->middleware('auth','verified');
route::get('/product_details/{id}',[HomeController::class,'product_details']);
route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
route::get('/show_cart  ',[HomeController::class,'show_cart']); //post because we are updating
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
route::get('/cash_order  ',[HomeController::class,'cash_order']); //post because we are updating
route::get('/stripe/{totalprice}',[HomeController::class,'stripe']); //post because we are updating
route::get('/stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post'); //post because we are updating


