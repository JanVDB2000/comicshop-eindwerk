<?php

use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MollieController;

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
Route::get('/', 'App\Http\Controllers\FrontEndController@index')->name('home');
Route::get('/shop', 'App\Http\Controllers\FrontEndController@shop')->name('home.shop');
Route::get('/shop/brand/{id}','App\Http\Controllers\FrontEndController@productsPerBrand')->name('productsPerBrandF');
Route::get('/shop/{product:slug}', 'App\Http\Controllers\FrontEndController@shopd')->name('home.shopd');
Route::get('/about','App\Http\Controllers\FrontEndController@about' )->name('home.about');
Route::get('/blog','App\Http\Controllers\FrontEndController@bloghome' )->name('home.bloghome');
Route::get('/blog/{post:slug}', 'App\Http\Controllers\FrontEndController@post')->name('home.post');
Route::get('/blogcategory/{category:slug}','App\Http\Controllers\AdminPostsCategoriesController@category')->name('category.category');
Route::get('/contact', 'App\Http\Controllers\FrontEndController@contact')->name('home.contact');
Route::get('/addtocart/{id}','App\Http\Controllers\FrontEndController@addToCart')->name('addToCart');
Route::get('/checkout','App\Http\Controllers\FrontEndController@cart')->name('checkout');
Route::post('/checkout','App\Http\Controllers\FrontEndController@updateQuantity')->name('quantity');
Route::get('/removeitem/{id}', 'App\Http\Controllers\FrontEndController@removeItem')->name('removeItem');
Route::get('/mollie-paymnet',[FrontEndController::Class,'orderReady'])->name('mollie.payment');
Route::get('/payment-success',[FrontEndController::Class, 'paymentSuccess'])->name('payment.success');


//verify zorgt ervoor dat enkel een geverifieerde user wordt toegelaten
//aan de geautentiseerde routes
Auth::routes(['verify'=>true]);



/***BACKEND ROUTES***/


/*Route::middleware(['auth'])->group(function(){
    Route::resource('admin/users',App\Http\Controllers\AdminUsersController::class);
});*/

Route::group(['prefix' => 'admin', 'middleware'=> 'admin'], function(){
    Route::resource('users',App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
    Route::resource('comments',\App\Http\Controllers\AdminPostCommentsController::class);
    Route::resource('replies', \App\Http\Controllers\AdminPostCommentRepliesController::class);
    Route::get('tags', 'App\Http\Controllers\AdminPostsTagsController@index')->name('posttags');
});
//Route::group(['prefix' => 'admin', 'middleware'=> ['auth','admin']], function()
Route::group(['prefix' => 'admin', 'middleware'=> ['auth','verified']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('homebackend');
    Route::resource('photos',App\Http\Controllers\AdminPhotosController::class);
    Route::resource('posts', App\Http\Controllers\AdminPostsController::class);
    Route::resource('postcategories', App\Http\Controllers\AdminPostsCategoriesController::class);
    Route::resource('products', \App\Http\Controllers\AdminProductsController::class);
    Route::resource('reviews', \App\Http\Controllers\AdminReviewsController::class);
    Route::resource('brands', \App\Http\Controllers\AdminBrandsController::class);
    Route::resource('product/categories',\App\Http\Controllers\AdminProductCategoryController::class);
    Route::get('products/brand/{id}','App\Http\Controllers\AdminProductsController@productsPerBrand')->name('productsPerBrand');

});

