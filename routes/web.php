<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get("/padmin",[AdminController::class,"admin"]);
Route::get("/padmin/products",[AdminController::class,"products"]);
Route::post("/products/upload",[AdminController::class,"uploadProduct"])->middleware('auth')->name('products.upload');
Route::delete("/products/{id}",[AdminController::class,"destroy"]);
Route::get("/products/{id}",[AdminController::class,"edit"]);
Route::post("/products/{id}",[AdminController::class,"update"]);

Route::get("/",[HomeController::class,"index"]);
Route::get("/redirect",[HomeController::class,"redirect"])->middleware('auth');
Route::get('/products',[HomeController::class, "products"]);
Route::post("/addcart/{id}",[HomeController::class,"addCart"]);
Route::post("/removecart/{id}",[HomeController::class,"removeCart"]);
Route::get("/cart/{id}",[HomeController::class,"showCart"]);
