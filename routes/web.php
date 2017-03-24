<?php

Route::match(['get', 'post'], '/', 'IndexController@index')->name('index');
Route::get('/#footer', 'IndexController@index')->name('index');;

Route::auth();

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //Admin statistics view (default)
    Route::get('/', function () {
//        Route::get('/', 'StatisticsController@index')->name('statistics');
        return view('admin.statistics');
    });

    //Admin slides section
    Route::group(['prefix' => 'slides'], function () {

        //Admin/slides
        Route::get('/', 'SlidesController@index')->name('slides');

        //Admin/slides/add
        Route::match(['get', 'post'], '/add', 'SlidesController@add')->name('slidesAdd');

        //Admin/slides/edit/id
        Route::match(['get', 'post', 'delete'], '/edit/{id}', 'SlidesController@edit')->name('slidesEdit');
    });

    //Admin settings section
    Route::group(['prefix' => 'settings'], function () {

        //Admin/settings
        Route::get('/', 'SettingsController@index')->name('slides');

        //Admin/settings/add
        Route::match(['get', 'post'], '/add', 'SettingsController@add')->name('settingsAdd');

        //Admin/settings/edit/id
        Route::match(['get', 'post', 'delete'], '/edit/{id}', 'SettingsController@edit')->name('settingsEdit');
    });
});