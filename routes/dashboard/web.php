<?php

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
    function(){
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function (){

            Route::get('/','DashboardController@index')->name('welcome');

            //users route
            Route::resource('users','UserController')->except(['show']);

            //categories route
            Route::resource('categories','CategoryController')->except(['show']);

            //Posts route
            Route::resource('posts','PostController')->except(['show']);

        });//end of dashboard route
    });



