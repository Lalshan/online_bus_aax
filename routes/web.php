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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verifyTemplate', 'VerifyController@getVerify')->name('veryTemplate');
Route::post('/verify', 'VerifyController@postVerify');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*========================
	   Admin Route
=========================*/
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']],function(){

	Route::get('/dashboard','DashboardController@index')->name('dashboard');
	Route::Resource('bus','BusController');
	Route::Resource('operator','OperatorController');

});


/*========================
	   User Route
=========================*/
Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']],function(){

	 Route::get('/dashboard','DashboardController@index')->name('dashboard');

});