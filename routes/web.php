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

Route::get('/shops4', function () {
	$shops = [
		'shop1',
		'shop2',
		'shop3',
		'shop4'
	];

    return view('pages.shops', compact('shops'));
});

Route::get('/help', function (){
	return view('pages/help');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shops', 'HomeController@shops')->name('shops');

