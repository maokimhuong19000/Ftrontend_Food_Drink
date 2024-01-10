<?php

use App\Http\Controllers\Fronted\AboutController;
use App\Http\Controllers\Fronted\BlogController;
use App\Http\Controllers\Fronted\CartController;
use App\Http\Controllers\Fronted\CheckOutController;
use App\Http\Controllers\Fronted\ContactController;
use App\Http\Controllers\Fronted\HomeController;
use App\Http\Controllers\Fronted\MenuController;
use App\Http\Controllers\Fronted\ProductSingleController;
use App\Http\Controllers\Fronted\ServiceController;
use App\Http\Controllers\Fronted\ShopController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Frontend Routes
Route::get('/',[HomeController::class,'home']);
Route::get('/about',[AboutController::class,'about']);
Route::get('/menu',[MenuController::class,'menu']);
Route::get('/service',[ServiceController::class,'service']);
Route::get('/blog',[BlogController::class,'blog']);
Route::get('shop',[ShopController::class,'shop']);
Route::get('/contact',[ContactController::class,'contact']);
Route::get('/productsingle',[ProductSingleController::class,'productsingle']);
Route::get('cart',[CartController::class,'cart']);
Route::get('/checkout',[CheckOutController::class,'checkout']);

