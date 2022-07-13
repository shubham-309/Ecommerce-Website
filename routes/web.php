<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\categorycontroller;
use App\Http\Controllers\Admin\productcontroller;
use App\Http\Controllers\frontend\frontcontroller;
use App\Http\Controllers\frontend\cartcontroller;
use App\Http\Controllers\frontend\usercontroller;
use App\Http\Controllers\frontend\dashboardcontroller;
use App\Http\Controllers\Admin\ordercontroller;
use App\Http\Controllers\frontend\wishlistcontroller;
use App\Http\Controllers\frontend\checkoutcontroller;


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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/' , [frontcontroller::class, 'index']);
Route::get('categories' , [frontcontroller::class, 'category']);
Route::get('view-categories/{slug}' , [frontcontroller::class, 'viewcategory']);
Route::get('categories/{cate_slug}/{prod_slug}' , [frontcontroller::class, 'productview']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('load-cart-data' , [cartcontroller::class, 'cartcount']);
Route::get('load-wishlist-data' , [wishlistcontroller::class, 'wishcount']);
Route::post('delete-cart' , [cartcontroller::class, 'deleteproduct'] );
Route::post('add-to-cart' , [cartcontroller::class, 'addproduct'] );
Route::post('update-cart' , [cartcontroller::class, 'updatecart'] );
Route::post('add-to-wishlist', [wishlistcontroller::class, 'add'] );
Route::post('delete-wishlist', [wishlistcontroller::class, 'deleteitem'] );


Route::middleware(['auth'])->group(function () {

    Route::get('cart', [cartcontroller::class, 'viewcart']);
    Route::get('checkout', [checkoutcontroller::class, 'checkout']);
    Route::post('place-order', [checkoutcontroller::class, 'placeorder']);
    Route::post('proceed-to-pay', [checkoutcontroller::class, 'razorpaycheck']);


    Route::get('my-orders', [usercontroller::class, 'myorders'] );
    Route::get('view-order/{id}', [usercontroller::class, 'view'] );

    Route::get('Wishlist', [wishlistcontroller::class, 'wishlist'] );






});


Route::middleware(['auth','isadmin'])->group( function (){

    Route::get('/dashboard', 'Admin\frontendcontroller@index');


    Route::get('category', 'Admin\categorycontroller@index');
    Route::get('add-category', 'Admin\categorycontroller@add');
    Route::post('insert-catagory', 'Admin\categorycontroller@insert' );
    Route::get('edit-catagory/{id}', 'Admin\categorycontroller@edit');
    Route::put('update-catagory/{id}', 'Admin\categorycontroller@update' );
    Route::get('delete-catagory/{id}', 'Admin\categorycontroller@delete' );


    Route::get('products', 'Admin\productcontroller@index');
    Route::get('add-product', 'Admin\productcontroller@add');
    Route::post('add-product', 'Admin\productcontroller@insert' );
    Route::get('edit-product/{id}', 'Admin\productcontroller@edit');
    Route::put('update-product/{id}', 'Admin\productcontroller@update' );
    Route::get('delete-product/{id}', 'Admin\productcontroller@delete' );


    Route::get('Users', 'Admin\dashboardcontroller@users');
    Route::get('view-user/{id}', 'Admin\dashboardcontroller@viewuser');


    Route::get('Orders', 'Admin\ordercontroller@index');
    Route::get('admin/view-order/{id}', 'Admin\ordercontroller@view');
    Route::put('update-order/', 'Admin\ordercontroller@updateorder' );
    Route::get('order-history', 'Admin\ordercontroller@orderhistory');






});
