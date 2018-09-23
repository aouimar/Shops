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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shops', 'HomeController@shops')->name('shops');
//Route::post('/shops', 'FavoriteShopController@refreshFavs')->name('refreshFavs');
Route::get('/shops/user', 'FavoriteShopController@refreshFavs');

Route::post('/shops/{id}/like','FavoriteShopController@likeShop');
Route::post('/shops/{id}/dislike','FavoriteShopController@dislikeShop');
Route::post('/shops/{id}/remove','FavoriteShopController@removeShop');
Route::get('/content/#prefered', 'FavoriteShopController@refreshFavs');
