<?php

Route::match(['get', 'post'], '/', 'IndexController@index')->name('index');
Route::get('/#footer', 'IndexController@index')->name('index');;

Route::auth();

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //Admin statistics view (default)
    Route::get('/', 'admin\StatisticsController@index')->name('statistics');

    //Admin slides section
    Route::group(['prefix' => 'slides'], function () {

        //Admin/slides
        Route::get('/', 'admin\SlidesController@index')->name('slides');

        //Admin/slides/add
        Route::match(['get', 'post'], '/add', 'SlidesController@add')->name('slidesAdd');

        //Admin/slides/edit/id
        Route::match(['get', 'post', 'delete'], '/edit/{id}', 'SlidesController@edit')->name('slidesEdit');
    });

    //Admin users section
    Route::group(['prefix' => 'users'], function () {

        //Admin/users
        Route::get('/', 'admin\UsersController@index')->name('users');

        //Admin/users/add
        Route::match(['get', 'post'], '/add', 'UsersController@add')->name('usersAdd');

        //Admin/users/edit/id
        Route::match(['get', 'post', 'delete'], '/edit/{id}', 'UsersController@edit')->name('usersEdit');
    });

    //Admin settings section
    Route::group(['prefix' => 'settings'], function () {

        //Admin/settings
        Route::get('/', 'SettingsController@index')->name('settings');

        //Admin/settings/add
        Route::match(['get', 'post'], '/add', 'SettingsController@add')->name('settingsAdd');

        //Admin/settings/edit/id
        Route::match(['get', 'post', 'delete'], '/edit/{id}', 'SettingsController@edit')->where('id', '[0-9]+')->name('settingsEdit');
    });
});