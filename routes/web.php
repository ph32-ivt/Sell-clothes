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
});

Route::get('home', function() {
	return view('admin.product.dashboard');
});


Route::middleware(['admin'])->group(function () {

	// Matches The "/admin/users" URL
    Route::prefix('category')->group(function () {

    	// List Category
	    Route::get('users', 'CategoryController@index');
	});

});
