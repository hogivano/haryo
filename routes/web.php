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

Route::get('/', 'HomeController@home')->name('home');


Route::get('login', 'HomeController@login')->name('login');
Route::post('login', 'UserController@login')->name('login.submit');

Route::get('register', 'HomeController@register')->name('register');
Route::post('register', 'UserController@register')->name('register.submit');

Route::get('coba', function(){
    return view('detail-image');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('logout', 'UserController@logout')->name('admin.logout');

    Route::group(['prefix' => 'kategori'], function(){
        Route::get('/', 'KategoriController@kategoriIndex')->name('admin.kategori.index');
        Route::get('new', 'KategoriController@kategoriNew')->name('admin.kategori.new');
        Route::get('edit/{id}', 'KategoriController@kategoriEdit')->name('admin.kategori.edit');
        Route::post('new', 'KategoriController@kategoriCreate')->name('admin.kategori.create');
        Route::post('edit/{id}', 'KategoriController@kategoriUpdate')->name('admin.kategori.update');
        Route::post('delete', 'KategoriController@kategoriDelete')->name('admin.kategori.delete');
    });

    Route::group(['prefix' => 'album'], function(){
        Route::get('/', 'AlbumController@albumIndex')->name('admin.album.index');
        Route::get('new', 'AlbumController@albumNew')->name('admin.album.new');
        Route::get('edit/{id}', 'AlbumController@albumEdit')->name('admin.album.edit');
        Route::post('edit/{id}', 'AlbumController@albumEdit')->name('admin.album.update');
        Route::post('new', 'AlbumController@albumCreate')->name('admin.album.create');
        Route::post('delete', 'AlbumController@albumDelete')->name('admin.album.delete');
        Route::post('upload', 'AlbumController@uploadImages')->name('admin.album.upload');
    });

    Route::group(['prefix' => 'video'], function(){
        Route::get('/', 'VideoController@videoIndex')->name('admin.video.index');
        Route::get('new', 'VideoController@videoNew')->name('admin.video.new');
        Route::get('edit/{id}', 'VideoController@videoEdit')->name('admin.video.edit');
        Route::post('new', 'VideoController@videoCreate')->name('admin.video.create');
        Route::post('edit/{id}', 'VideoController@videoUpdate')->name('admin.video.update');
        Route::post('delete', 'VideoController@videoDelete')->name('admin.video.delete');
    });

    Route::group(['prefix' => 'slide-show'], function(){
        Route::get('/', 'SlideShowController@slideShowIndex')->name('admin.slide-show.index');
        Route::post('change', 'SlideShowController@slideShowChange')->name('admin.slide-show.change');
    });

    Route::post('logout', 'UserController@logout')->name('login.logout');
});
