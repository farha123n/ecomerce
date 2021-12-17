<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::view('/', 'welcome')->name('home');

// Route::get('/mypage/test/about_us', function () {
//     return view('about_us');
// })->name('about_us');

//Route::get('/about_us', 'AboutusController@index')->name('about_us');
//Route::get('/about_us', 'AboutusController@index');
//Route::view('/about_us', 'about_us', ['description' => 'Laravel Batch 10']);

Route::get('{pages}', 'AllPages')->name('pages')->where('pages','about_us|contact_us');

Route::resource('products', 'ProductController');
Route::get('lang/{locale}', 'LocalizationController@index');

Route::post('/submitContact', 'ContactInfoController@submitContact')->name('submit_contact');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/details/{id}', 'ProductController@details')->name('details');
Route::get('/livesearch', 'HomeController@livesearch');
Route::post('/update-cart', 'CartController@updateCartAjax')->name('update-cart');
	Route::post('/remove-from-cart', 'CartController@removeFromCartAjax')->name('remove-from-cart');
Route::get('/proceed-to-checkout', 'CartController@checkoutPage')->name('proceed-to-checkout');

Route::namespace("Admin")->prefix('admin')->group(function(){
 	Route::get('/', 'DashboardController@index')->name('admin.home');
 

 	// Category Routes Start
 	Route::resource('category', 'CategoryController');

 	// Category Routes End
 	Route::resource('roles','RoleController');
    Route::resource('users','UserController');
 	Route::resource('product', 'ProductController');
 	Route::get('/download_products', 'ProductController@downloadProducts')->name('download_products');

 	Route::namespace('Auth')->group(function(){
	 	Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
	 	Route::post('/login', 'LoginController@login');
	 	Route::post('logout', 'LoginController@logout')->name('admin.logout');
 	});
});
