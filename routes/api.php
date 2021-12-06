<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware("auth:sanctum")->get('/produk', [ProdukController::class, "show"]);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/user/reset-password', [UserController::class, 'resetPassword']);


Route::group(['as' => 'api.', 'middleware' => 'auth:sanctum'], function () {
    Orion::resource('produk', ProdukController::class);
});
