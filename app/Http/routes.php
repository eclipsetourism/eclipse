<?php

use App\Package;
use App\User;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('testing', function() {

	return session('currency');

});

Route::get('routes', function() {
	\Artisan::call('route:list');
	return "<pre>".\Artisan::output();
});

Event::listen('illuminate.query', function($query) {
	//var_dump($query);
});

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::post('change-currency', ['as' => 'change-currency', 'uses' => 'PagesController@changeCurrency']);

Route::get('tourist-information', ['as' => 'tourist-information', 'uses' => 'PagesController@touristInformation']);
Route::get('corporate', ['as' => 'corporate', 'uses' => 'PagesController@corporate']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@about']);
Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);

Route::get('packages', ['as' => 'packages', 'uses' => 'PackagesController@index']);
Route::get('package/{package}', ['as' => 'package', 'uses' => 'PackagesController@package']);

Route::resource('cart', 'CartController');

Route::get('checkout', ['as' => 'checkout', 'uses' => 'BillingsController@checkout']);
Route::post('checkout', ['as' => 'checkout', 'uses' => 'BillingsController@onCheckout']);
Route::get('checkout/success', ['as' => 'checkout.success', 'uses' => 'BillingsController@checkoutSuccess']);
/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('auth/login', 'AuthController@login');
Route::post('auth/login', 'AuthController@postLogin');
Route::get('auth/logout', 'AuthController@logout');

// Route::get('auth/register', 'AuthController@register');
// Route::post('auth/register', 'AuthController@postRegister');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	
	Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin\AdminController@home']);
	
	Route::put('packages/photos/upload', [
				'as' => 'admin.packages.photos.upload', 
				'uses' => 'Admin\PhotosController@uploadPackagePhoto'
			]);	

	Route::delete('packages/photos/delete/{path}', [
				'as' => 'admin.packages.photos.delete', 
				'uses' => 'Admin\PhotosController@deletePackagePhoto'
			]);		
	
	Route::resource('packages', 'Admin\PackagesController');

	Route::resource('bookings', 'Admin\BookingsController');
	

});

