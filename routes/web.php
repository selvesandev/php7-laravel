<?php


Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'AppController@index');
    Route::get('/home', 'AppController@index');
    Route::get('/contact', 'AppController@contact')->name('my-contact-route');
    Route::get('/about', 'AppController@about')->name('my-about-route');

    Route::match(['get', 'post'], '/get-post', 'AppController@onAny');
});


Route::group(['prefix' => Config::get('site.admin'), 'namespace' => 'Backend'], function () {
    Route::get('/', 'BackendController@index')->name('admin-dashboard');

    Route::group(['prefix' => 'news'], function () {
        Route::get('/', 'NewsController@index')->name('admin-news');
        Route::get('/add', 'NewsController@add')->name('admin-news-add');
        Route::get('/update/{id}', 'NewsController@update')->name('admin-news-update')->where(['id' => '[0-9]+']);
        Route::get('/delete/{id}', 'NewsController@delete')->name('admin-news-delete')->where(['id' => '[0-9]+']);
    });

});