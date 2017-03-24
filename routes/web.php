<?php

Route::match(['get', 'post'], '/', 'IndexController@index')->name('home');
Route::get('/#footer', 'IndexController@index')->name('home');
Route::auth();

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //Admin home view
    Route::get('/', function () {

    });

    //Admin/slides
    Route::group(['prefix' => 'slides'], function () {

        //Admin/slides
        Route::get('/', 'SlidesController@index')->name('slides');

        //Admin/slides/add
        Route::match(['get', 'post'], '/add', 'SlidesController@add')->name('slidesAdd');

        //Admin/slides/edit/id
        Route::match(['get', 'post', 'delete'], '/edit/{id}', 'SlidesController@edit')->name('slidesEdit');
    });
});