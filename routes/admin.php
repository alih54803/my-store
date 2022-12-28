<?php

use App\Http\Controllers\admin\rolecontroller;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BrandsController;
use App\Http\Controllers\admin\usercontroller;
use App\Http\Controllers\admin\permissionController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Auth::routes();
Route::post('/products/add/modre/choice', [ProductsController::class,'products_add_more_choice_option'])->name('add.product.options');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\DashboardControler::class, 'index'])->name('dashboard');
    Route::resource('/laptop_route', crudControler::class);

    Route::resource('categories',App\Http\Controllers\admin\CategoryController::class);

    // Route::controller(App\Http\Controllers\admin\CategoryController::class)->group(function () {
    //     Route::get('category', 'index');
    //     Route::get('category/create', 'create');
    //     Route::post('category/store', 'store');
    // });
    Route::get('/brands', [App\Http\Controllers\admin\BrandsController::class, 'index']);
    Route::post('/brands', [App\Http\Controllers\admin\BrandsController::class, 'store']);

    Route::resource('slider', App\Http\Controllers\admin\SliderController::class);
    Route::controller(App\Http\Controllers\admin\ProductsController::class)->group(function () {
        Route::get('products', 'index');
        Route::get('products/sku/combination', 'products_sku_combination')->name('products.sku_combination');
        Route::get('products/create', 'create');
        // Route::post('products/add/modre/choice', 'products_add_more_choice_option')->name('products.add-more-choice-option');
        Route::post('/product/store', 'store_product')->name('admin.product_store');
    });

    Route::get('/users', [App\Http\Controllers\Frontend\FrontendController::class, 'users']);
    Route::get('/orders', [App\Http\Controllers\admin\OrderController::class, 'index']);
    Route::get('/view-order/{id}', [App\Http\Controllers\admin\OrderController::class, 'orderView']);
    Route::put('/update-order/{id}', [App\Http\Controllers\admin\OrderController::class, 'updateOrder']);
    Route::get('/order-history', [App\Http\Controllers\admin\OrderController::class, 'orderHistory']);

    Route::resource('roles', rolecontroller::class);
    Route::resource('users', usercontroller::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('/laptop_route', crudControler::class);

    // Route::resource('products', ProductController::class);


    ////// Attribute Contrller///////
    Route::resource('attributes',App\Http\Controllers\AttributeController::class);
    Route::get('attributes/{id}/and/{name}',[App\Http\Controllers\AttributeController::class, 'myedit'])->name('attributes.myedit');
    Route::post('attributes/value',[App\Http\Controllers\AttributeController::class, 'store_attribute_value'])->name('attributes.value.store');
});
