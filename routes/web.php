<?php

use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Auth;
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

//verify zorgt ervoor dat enkel een geverifieerde user wordt toegelaten
//aan de geautentiseerde routes
Auth::routes(['verify'=>true]);

/*** Frontend ROUTES ***/
Route::get('/', 'App\Http\Controllers\FrontEndController@index')->name('home');
Route::get('/shop', 'App\Http\Controllers\FrontEndController@shop')->name('home.shop');
Route::get('/shop/brand/{id}','App\Http\Controllers\FrontEndController@productsPerBrand')->name('productsPerBrandF');
Route::get('/shop/{product:slug}', 'App\Http\Controllers\FrontEndController@shopd')->name('home.shopd');
Route::get('/about','App\Http\Controllers\FrontEndController@about' )->name('home.about');
Route::get('/blog','App\Http\Controllers\FrontEndController@bloghome' )->name('home.bloghome');
Route::get('/blog/{post:slug}', 'App\Http\Controllers\FrontEndController@post')->name('home.post');
Route::get('/contact', 'App\Http\Controllers\FrontEndController@contact')->name('home.contact');


/*** Auth Frontend ROUTES ***/
Route::group(['middleware'=>'auth'], function(){
    Route::get('/orderlist', 'App\Http\Controllers\FrontEndController@orderListUser')->name('home.orderList');
    Route::get('/orderlistpdf/{id}', 'App\Http\Controllers\FrontEndController@orderListUserPDF')->name('home.orderListPDF');
    Route::get('/addtocart/{id}','App\Http\Controllers\FrontEndController@addToCart')->name('addToCart');
    Route::get('/checkout','App\Http\Controllers\FrontEndController@cart')->name('checkout');
    Route::post('/review','App\Http\Controllers\FrontEndController@ReviewStore')->name('home.review');
    Route::post('/checkout','App\Http\Controllers\FrontEndController@updateQuantity')->name('quantity');
    Route::get('/removeitem/{id}', 'App\Http\Controllers\FrontEndController@removeItem')->name('removeItem');
    Route::post('/factuur-address','App\Http\Controllers\FrontEndController@factuurAddress')->name('FactuurAddress');
    Route::get('/mollie-payment',[FrontEndController::Class,'orderReady'])->name('mollie.payment');
    Route::get('/payment-success',[FrontEndController::Class, 'paymentSuccess'])->name('payment.success');
});



/*** BACKEND ROUTES ***/
Route::group(['prefix' => 'admin', 'middleware'=> ['auth','admin']], function(){
    Route::get('/', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('homebackend');
    Route::resource('users',App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
    Route::resource('orders',App\Http\Controllers\AdminOrdersController::class);
    Route::resource('photos',App\Http\Controllers\AdminPhotosController::class);
    Route::resource('posts', App\Http\Controllers\AdminPostsController::class);
    Route::resource('postcategories', App\Http\Controllers\AdminPostsCategoriesController::class);
    Route::resource('products', \App\Http\Controllers\AdminProductsController::class);
    Route::resource('reviews', \App\Http\Controllers\AdminReviewsController::class);
    Route::resource('brands', \App\Http\Controllers\AdminBrandsController::class);
    Route::resource('product/categories',\App\Http\Controllers\AdminProductCategoryController::class);
    Route::get('products/brand/{id}','App\Http\Controllers\AdminProductsController@productsPerBrand')->name('productsPerBrand');
});

