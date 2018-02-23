<?php


Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'AppController@index');
    Route::get('/home', 'AppController@index');
    Route::get('/contact', 'AppController@contact')->name('my-contact-route');
    Route::get('/about', 'AppController@about')->name('my-about-route');

    Route::match(['get', 'post'], '/get-post', 'AppController@onAny');
});


Route::group(['prefix' => Config::get('site.admin'), 'namespace' => 'Backend'], function () {
    Route::get('/', 'BackendController@index');
});