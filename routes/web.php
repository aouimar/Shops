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


//route to view.auth
Auth::routes();

//route to welcoming page / default
Route::get('/', function () {
     return view('pages.welcome');
});

//route to welcome/shops pages
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shops', 'HomeController@shops')->name('shops');

//somme routes to trigger (http post) back end controller FavoriteShopController 
Route::post('/shops/{id}/like','FavoriteShopController@likeShop');
Route::post('/shops/{id}/dislike','FavoriteShopController@dislikeShop');
Route::post('/shops/{id}/remove','FavoriteShopController@removeShop');

