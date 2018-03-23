<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Blog Routes
Route::group(['prefix' => 'blog'], function () {
    Route::post('get-rashifal-mesh', 'ApiController@getBlogs');
    Route::get('get/{id}', 'ApiController@getSingleBlog')->where('id', '[0-9]+');
    Route::post('insert', 'ApiController@insertBlog');
    Route::post('update', 'ApiController@updateBlog');
    Route::get('delete/{id}', 'ApiController@deleteBlog')->where('id', '[0-9]+');
});


Route::post('/create-data', 'VueController@createData');
Route::get('/get-data/{id?}', 'VueController@getData');
Route::delete('/delete-data/{id}', 'VueController@deleteData');
Route::post('/edit-data/{id}', 'VueController@editData');