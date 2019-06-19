<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/restos', 'RestaurantController@index')->name('restos');
    
    Route::get('/restos/menu/{id}', 'MenuController@index')->name('restos.menu');

    Route::get('restos/orders/{id}', 'RestaurantOrderController@index')->name('restos.orders');

});