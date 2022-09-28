<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class,'index'])->name('home');
Route::get('order/ajax/{id}',[FrontendController::class,'ajax'])->name('order.ajax');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>['auth']],function(){

    // Admin home
    Route::get('/admin',[HomeController::class,'home'])->name('admin');

    //company details
    Route::get('company-details/index',[CompanyDetailsController::class,'index'])->name('company-details.index');
    Route::post('company-details/store',[CompanyDetailsController::class,'store'])->name('company-details.store');
    Route::get('company-details/edit/{id}',[CompanyDetailsController::class,'edit'])->name('company-details.edit');
    Route::put('company-details/update',[CompanyDetailsController::class,'update'])->name('company-details.update');
    Route::post('company-details/delete/{id}',[CompanyDetailsController::class,'destroy'])->name('company-details.destroy');

    //Category Mangement
    Route::group(['as' => 'category.', 'prefix' => 'category'], function() {
        Route::get('/index',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
        Route::patch('/update/{id}',[CategoryController::class,'update'])->name('update');
        Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('destroy');
    });

    //Brand Mangement
    Route::group(['as' => 'brand.', 'prefix' => 'brand'], function() {
        Route::get('/index',[BrandController::class,'index'])->name('index');
        Route::get('/create',[BrandController::class,'create'])->name('create');
        Route::post('/store',[BrandController::class,'store'])->name('store');
        Route::get('/edit/{id}',[BrandController::class,'edit'])->name('edit');
        Route::patch('/update/{id}',[BrandController::class,'update'])->name('update');
        Route::get('/delete/{id}',[BrandController::class,'destroy'])->name('destroy');
    });

    //Shippin Mangement
    Route::group(['as' => 'shipping.', 'prefix' => 'shipping'], function() {
        Route::get('/index',[ShippingController::class,'index'])->name('index');
        Route::get('/create',[ShippingController::class,'create'])->name('create');
        Route::post('/store',[ShippingController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ShippingController::class,'edit'])->name('edit');
        Route::patch('/update/{id}',[ShippingController::class,'update'])->name('update');
        Route::get('/delete/{id}',[ShippingController::class,'destroy'])->name('destroy');
    });

    //PRODUCT MANAGEMENT
    Route::group(['as' => 'product.', 'prefix' => 'product'], function() {
        Route::get('/index',[ProductController::class,'index'])->name('index');
        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::post('/store',[ProductController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[ProductController::class,'update'])->name('update');
        Route::get('/delete/{id}',[ProductController::class,'destroy'])->name('destroy');
    });

    //Order Management
    Route::group(['as' => 'order.', 'prefix' => 'order'], function() {
        Route::get('/index',[OrderController::class,'index'])->name('index');
        Route::get('/create',[OrderController::class,'create'])->name('create');
        Route::post('/store',[OrderController::class,'store'])->name('store');
        Route::get('/edit/{id}',[OrderController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[OrderController::class,'update'])->name('update');
        Route::get('/delete/{id}',[OrderController::class,'destroy'])->name('destroy');

    });
});


require __DIR__.'/auth.php';

