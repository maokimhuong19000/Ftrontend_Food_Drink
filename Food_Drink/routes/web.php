<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ButtonsController;
use App\Http\Controllers\Backend\DatatableController;
use App\Http\Controllers\Backend\InsertDataController;

use App\Http\Controllers\Backend\InsertFoodController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\MasterController;
use App\Http\Controllers\Backend\SessionController;
use App\Http\Controllers\Backend\TableController;
use App\Http\Controllers\Backend\UserController;
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



Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [MasterController::class, 'master']);
    Route::get('/usertable', [UserController::class, 'usertable']);
    Route::get('/registeration', [MasterController::class, 'registeration']);
    Route::get('/edituser{id}', [MasterController::class, 'edituser'])->name('user.edit');
    Route::post('/registeruser', [MasterController::class, 'registeruser'])->name('registeruser');
    Route::get('/insert', [InsertFoodController::class, 'insert']);
    Route::get('/button', [ButtonsController::class, 'button']);
    Route::get('/table', [TableController::class, 'table']);
    Route::POST('/save', [InsertFoodController::class, 'save'])->name('save');
    Route::POST('/update', [InsertFoodController::class, 'update'])->name('food.update');
    Route::get('/edit{id}', [InsertFoodController::class, 'edit'])->name('food.edit');
    Route::delete('/food/{id}', [InsertFoodController::class, 'destroy'])->name('food.destroy');
    Route::get('/datatables', [DatatableController::class, 'dtroom']);
    Route::get('/search', [InsertFoodController::class,'search'])->name('food.search');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('','index');
    Route::get('login','login')->name('login');
    Route::post('login/post','postLogin')->name('login.post');
});

// Frontend Routes
Route::get('/', [AuthController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/menu', [MenuController::class, 'menu']);
Route::get('/service', [ServiceController::class, 'service']);
Route::get('/blog', [BlogController::class, 'blog']);
Route::get('shop', [ShopController::class, 'shop']);
Route::get('/contact', [ContactController::class, 'contact']);
Route::get('/productsingle', [ProductSingleController::class, 'productsingle']);
Route::get('cart', [CartController::class, 'cart']);
Route::get('/checkout', [CheckOutController::class, 'checkout']);


//Datatables Routes

