<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('auth',function(){

//     return Auth::user();
//     $response = ['auth' => Auth::user()->is_admin];

//     return response()->json($response,201);
// });


Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});
