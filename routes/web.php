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

Route::prefix('places')->group(function () {

    Route::name('photo.')->group(function () {
        Route::get('/{photo}/{mark}/photos/like', 'PictureController@likePhoto')->name('like');
        Route::get('/{place}/photos/add', 'PlaceController@addPhoto')->name('get_linked_form');
    });

    Route::get('/{place}/{mark}/places/like', 'PlaceController@likePlace')->name('place.like');
    Route::resource('/place', 'PlaceController')->except(['edit', 'update', 'destroy']);

    Route::resource('/photo', 'PictureController')->only(['show', 'store', 'destroy']);

});

Route::middleware('menu')->group(function () {
    Route::get('/photos/add', 'PlaceController@addAnyPhoto')->name('photo.get_wildcard_form');
    Route::get('/rating', 'RatingController@index')->name('rating.show');
});

Route::redirect('/', route('place.index'));
