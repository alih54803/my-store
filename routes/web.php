<?php

use App\Http\Controllers\admin\rolecontroller;
use App\Http\Controllers\admin\usercontroller;
use App\Http\Controllers\admin\permissionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudControler;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialLoginController;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('dropzone',function(){
    return view('dropzone');
});
Route::get('sms',function(){
    return view('sms');
});

Route::get('sendsms',[HomeController::class,'sendsms']);
Route::get('sendtwiliosms',[HomeController::class,'sendtwiliosms']);
// Route::get('umerroute', function(){
//     return view('myviews.test');
// });
//Route::view('umer', 'myviews.list');
Route::post('/store_media/drop',[HomeController::class,'storeMedia']);
Route::post('store_dropzone',[HomeController::class,'storeDropzone'])->name('store.dropzone');
Route::group(['middleware'=>'auth'],function () {
});
Route::get('/show', [crudControler::class, 'index']);
Route::get('/add_data', [crudControler::class, 'create']);
Route::post('/add_form_data', [crudControler::class, 'store']);
Route::get('/edit_data/{id}', [crudControler::class, 'edit']);
Route::put('/update_form_data/{id}', [crudControler::class, 'update']);

//Route::get('/delete_data/{id}',[crudControler::class,'destroy']);
Route::delete('/delete_data/{id}', [crudControler::class, 'destroy']);

// Route::middleware(['auth', 'user-access:user'])->group(function () {

//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });

//Route::resource('laptop_route', crudControler::class);
//  Route::get('/', function () {
//     return view('frontend.index');
// });







// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');












Route::get('export', [App\Http\Controllers\ImportExportController::class, 'export'])->name('export');
Route::post('import', [App\Http\Controllers\ImportExportController::class, 'import'])->name('import');

// Auth::routes(['verify' => true]);

Route::post('/fetch_states', [App\Http\Controllers\Frontend\checkoutController::class, 'fetchStates']);
Route::post('/fetchCities', [App\Http\Controllers\Frontend\checkoutController::class, 'fetchCities']);

Route::view('/a', 'faf');
// Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'practice']);
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::post('/convert', [App\Http\Controllers\Frontend\FrontendController::class, 'convert'])->name('currency.convert');
Route::get('collection', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);

Route::get('collection/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('collection/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productDetail']);

Route::get('collectionss/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productswithajax']);
Route::get('collectionss/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productDetailwithAjax']);


Route::get('serachBYbrands', [App\Http\Controllers\Frontend\FrontendController::class, 'brands']);


Route::post('add-to-cart', [App\Http\Controllers\Frontend\addToCartController::class, 'addToCartt']);
Route::post('update-to-cart', [App\Http\Controllers\Frontend\addToCartController::class, 'updateToCartt']);

Route::middleware(['auth'])->group(function () {


    Route::get('wishlists', [App\Http\Controllers\Frontend\WishlistController::class, 'wishlist']);
    Route::get('addtocart', [App\Http\Controllers\Frontend\addToCartController::class, 'addtocart']);
    Route::get('checkout', [App\Http\Controllers\Frontend\checkoutController::class, 'index']);
    Route::post('place-order', [App\Http\Controllers\Frontend\checkoutController::class, 'placeOrder']);
    Route::get('my-orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('view-order/{id}', [App\Http\Controllers\Frontend\OrderController::class, 'view']);
});

// Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/currencyConvert', [App\Http\Controllers\HomeController::class, 'currencyConvert']);
Route::get('/allExchangeRates', [App\Http\Controllers\HomeController::class, 'allExchangeRates']);


Route::get('send/notification', [FrontendController::class, 'sendNotification'])->name('send.notification');
Route::get('/auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback']);

// Route::group(['namespace' => 'Dashboard', 'as'=>'dashboard.', 'middleware' => 'auth'], function () {

//     Route::group(['middleware' => 'role:admin'], function() {

//         /* Users */
//         Route::resource('dashboard/users', 'UserController');
//         Route::resource('dashboard/roles', 'RoleController');
//         Route::resource('dashboard/permissions', 'PermissionController');
//         /* /Users */
//     });

// });


// Route::resource('laptop_route', ['middleware' => 'auth', 'uses' => 'crudControler']);
// Route::resource('laptop_route', 'crudControler', ['middleware' => 'auth']);
// Route::get('{title}', function($title) {
//     $ContentPage = ContentPage::where('title','=',$title)->orderBy('id','desc')->first();

//     if ( is_null($ContentPage) )
//         return Event::first('404');
//          return View::make('admin.contentPages.show_desc', array('ContentPage' => $ContentPage));

//     });
