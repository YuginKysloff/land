<?php

Route::match(['get', 'post'], '/', 'IndexController@index')->name('index');
Route::get('/#footer', 'IndexController@index')->name('index');

Route::get('/test/', 'auth\LoginController@vkAuth');
Route::get('/token/', 'auth\LoginController@vkToken');

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
        Route::post('/show', 'admin\SlidesController@show')->name('showSlide');
        Route::get('/create', 'admin\SlidesController@create')->name('createSlide');
        Route::post('/store', 'admin\SlidesController@store')->name('storeSlide');

        //Admin/slides/edit/id
        Route::get('/edit/{id}', 'admin\SlidesController@edit')->name('editSlide');
        Route::put('/update', 'admin\SlidesController@update')->name('updateSlide');
        Route::delete('/destroy', 'admin\SlidesController@destroy')->name('destroySlide');
    });

    //Admin users section
    Route::group(['prefix' => 'users'], function () {

        //Admin/users
        Route::get('/', 'admin\UsersController@index')->name('users');

        //Admin/users/add
        Route::get('/add', function(){
            return view('admin.addUser');
        })->name('addUserGet');
        Route::post('/add', 'admin\UsersController@add')->name('addUserPost');

        //Admin/users/edit/id
        Route::match(['get', 'post', 'delete'], '/edit/{id}', 'admin\UsersController@edit')->name('editUser');
    });

    //Admin settings section
    Route::group(['prefix' => 'settings'], function () {

        //Admin/settings
        Route::get('/', 'admin\SettingsController@index')->name('settings');

        //Admin/settings/add
        Route::match(['get', 'post'], '/add', 'admin\SettingsController@add')->name('addSetting');

        //Admin/settings/edit/id
        Route::match(['get', 'post', 'delete'], '/edit/{id}', 'admin\SettingsController@edit')->where('id', '[0-9]+')->name('editSetting');
    });
});