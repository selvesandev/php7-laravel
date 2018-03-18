<?php


use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'AppController@index');
    Route::get('/contact/{age}', 'AppController@contact')->name('my-contact-route')->middleware('checkAge');
    Route::get('/about', 'AppController@about')->name('my-about-route')->middleware('auth');
    Route::get('/test-route', 'AppController@xyz');
    Route::get('/categories/{id}', 'AppController@newsByCategory')->name('category-news');
    Route::get('/news/{slug}', 'AppController@getSingle')->name('news-single');
    Route::match(['get', 'post'], '/get-post', 'AppController@onAny');
});


Route::group(['prefix' => Config::get('site.admin'), 'namespace' => 'Backend'], function () {
    Route::get('/login', 'LoginController@login')->name('admin-login');
    Route::post('/login', 'LoginController@loginAction');
    Route::any('/logout', 'LoginController@logout')->name('admin-logout');

    Route::group(['middleware' => 'auth:admin'], function () {
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
            Route::post('/update/status', 'NewsController@updateStatus')->name('update-news-status');

        });


        Route::get('/update/profile', 'AdminController@updateProfile')->name('update-profile');
        Route::post('/update/profile', 'AdminController@updateProfileAction');
        Route::post('/update/password', 'AdminController@updatePasswordAction')->name('update-admin-password');

        Route::group(['prefix' => 'admin', 'middleware' => 'checkAdmin'], function () {
            Route::get('/add', 'AdminController@add')->name('add-admin');
            Route::post('/add', 'AdminController@addAction');
            Route::get('/', 'AdminController@index')->name('view-admin');
            Route::get('/delete/{id}', 'AdminController@delete')->name('delete-admin');
        });
    });

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('bugsnag', function () {
    Bugsnag::notifyException(new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("Selvesan's Test error"));
});