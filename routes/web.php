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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group( ['prefix' => 'user' , 'middleware' => ['auth']] , function(){
	Route::get('/profile', ['as' => 'profile',function(){
		return view('profiles.profile');
	}]);
});

Route::post('port','ImagesController@storeImgPort')->name('storeImgPort');

Route::post('prof','ImagesController@storeImgProf')->name('storeImgProf');

Route::resource('topics','TopicsController');

Route::get('/home', 'HomeController@index')->name('home');
