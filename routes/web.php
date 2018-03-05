<?php


Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'AppController@index');
    Route::get('/home', 'AppController@index');
    Route::get('/contact', 'AppController@contact')->name('my-contact-route');
    Route::get('/about', 'AppController@about')->name('my-about-route');

    Route::match(['get', 'post'], '/get-post', 'AppController@onAny');
});


Route::group(['prefix' => Config::get('site.admin'), 'namespace' => 'Backend'], function () {

    Route::get('/login', 'LoginController@login')->name('admin-login');
    Route::post('/login', 'LoginController@loginAction');
    Route::any('/logout', 'LoginController@logout');


    Route::get('/', 'BackendController@index')->name('admin-dashboard');

    Route::group(['prefix' => 'news'], function () {

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', 'CategoriesController@index')->name('admin-categories');
            Route::post('/', 'CategoriesController@addAction');
            Route::post('/update-status', 'CategoriesController@updateStatus')->name('update-cat-status');
        });


        Route::get('/', 'NewsController@index')->name('admin-news');
        Route::get('/add', 'NewsController@add')->name('admin-news-add');
        Route::post('/add', 'NewsController@addAction');
        Route::get('/update/{id}', 'NewsController@update')->name('admin-news-update')->where(['id' => '[0-9]+']);
        Route::get('/delete/{id}', 'NewsController@delete')->name('admin-news-delete')->where(['id' => '[0-9]+']);
        Route::post('/update/priority/{id}', 'NewsController@updatePriority')->name('update-priority')->where(['id' => '[0-9]+']);

    });

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/add', 'AdminController@add')->name('add-admin');
        Route::post('/add', 'AdminController@addAction');
        Route::get('/', 'AdminController@index')->name('view-admin');
        Route::get('/delete/{id}', 'AdminController@delete')->name('delete-admin');
    });

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
