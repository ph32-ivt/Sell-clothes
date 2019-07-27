<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('page', function() {
	return view('admin.layouts.master');
});
// <base href="{{ asset('') }}">


Route::prefix('admin')->group(function () {
	Route::group(['middleware' => ['auth']], function () {
	    // Matches The "/admin/users" URL
	    Route::prefix('category')->group(function () {

	    	// List Category
		    Route::get('/', 'CategoryController@index')->name('category-list');

		    // Create Category
		    Route::get('create', 'CategoryController@create')->name('category-create');
		    Route::post('create', 'CategoryController@store')->name('category-store');

		    // Edit category
		    Route::get('edit/{id}', 'CategoryController@edit')->name('category-edit');
		    Route::post('edit/{id}', 'CategoryController@update')->name('category-update');

		    // Delete category
		    Route::get('delete/{id}', 'CategoryController@delete')->name('category-delete');
		});



	    // Modal Product
		Route::prefix('products')->group(function () {

	    	// List Product
		    Route::get('/', 'ProductController@index')->name('product-list');

		    // Create Product
		    Route::get('create', 'ProductController@create')->name('product-create');
		    Route::post('create', 'ProductController@store')->name('product-store');
		    // Get Category By Category Parent
		    Route::get('create/{idCate_parent}', 'ProductController@getCategory');

		    // Edit Product
		    Route::get('edit/{id}', 'ProductController@edit')->name('product-edit');
		    Route::post('edit/{id}', 'ProductController@update')->name('product-update');

		    // Delete Product
		    Route::get('delete/{id}', 'ProductController@delete')->name('product-delete');
		    // Delete Image
		    Route::get('del-image/{id}', 'ProductController@delImage')->name('delete-image');
		});



		// Modal User
		Route::prefix('user')->group(function () {

	    	// List User
		    Route::get('/', 'UserController@index')->name('user-list');

		    // Create User
		    Route::get('create', 'UserController@create')->name('user-create');
		    Route::post('create', 'UserController@store')->name('user-store');

		    // Edit User
		    Route::get('edit/{id}', 'UserController@edit')->name('user-edit');
		    Route::post('edit/{id}', 'UserController@update')->name('user-update');

		    // Delete User
		    Route::get('delete/{id}', 'UserController@delete')->name('user-delete');
		});
	});	
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Login User
Route::get('auth/login', 'Auth\LoginController@getLogin')->name('getLogin');
Route::post('auth/login', 'Auth\LoginController@postLogin')->name('postLogin');

// Register User
Route::get('auth/register', 'Auth\LoginController@getRegister')->name('getRegister');
Route::post('auth/register', 'Auth\LoginController@postRegister')->name('postRegister');
// Logout
Route::get('auth/logout', 'Auth\LoginController@getLogout')->name('getLogout');


////////////////////////////////////


Route::prefix('users')->group(function () {
	// Homapage
    Route::get('homepage', 'PageController@index')->name('homepage');
    // Product Type
    Route::get('product-type/{id}', 'PageController@productType')->name('product-type');
    // Product Detail
    Route::get('product-detail/{id}', 'PageController@productDetail')->name('product-detail');
});
