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

Route::get('/test', function () {
    return dd(App\User::find(1)->profile);
});
Auth::routes();


Route::group(['prefix'=>'admin',"middleware"=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/post', 'PostsController@index')->name('post');
    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::post('/post/store', 'PostsController@store')->name('post.store');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');
    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::get('/post/kill/{id}','PostsController@kill')->name('post.kill');
    Route::get('/post/restore/{id}','PostsController@restore')->name('post.restore');
    Route::get('/post/trashed','PostsController@trash')->name('post.trash');
    Route::get('/category', 'CategoriesController@index')->name('category');
    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');
    Route::get('/tag', 'TagsController@index')->name('tag');
    Route::get('/tag/create', 'TagsController@create')->name('tag.create');
    Route::post('/tag/store', 'TagsController@store')->name('tag.store');
    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');
    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');
    Route::get('/user', 'UsersController@index')->name('user');
    Route::get('/user/create', 'UsersController@create')->name('user.create');
    Route::post('/user/store', 'UsersController@store')->name('user.store');
    Route::get('/user/edit/{id}', 'UsersController@edit')->name('user.edit');
    Route::post('/user/update/{id}', 'UsersController@update')->name('user.update');
    Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.delete');
    Route::get('/user/permission/{id}', 'UsersController@admin')->name('user.admin');






});

