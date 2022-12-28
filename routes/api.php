<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [App\Http\Controllers\API\UserController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\API\UserController::class, 'register']);

    Route::post('add-to-cart', [App\Http\Controllers\Frontend\addToCartController::class, 'addToCartt']);



    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/logout', [App\Http\Controllers\API\UserController::class, 'logout']);

        Route::post('/addtocart', [App\Http\Controllers\API\addtoCartController::class, 'addtocart']);
        Route::get('/viewAllOrders', [App\Http\Controllers\API\ordersController::class, 'viewAllOrders']);

    });
});

Route::get('/categories', [App\Http\Controllers\API\CategoryController::class, 'categories']);
Route::apiResource('laptop_route', crudControler::class);
