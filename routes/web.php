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

Auth::routes();
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
    function(){
    	Route::get('/', 'HomeController@index')->name('home');

		Route::get('pages/article/{id}', 'PostController@index');

		Route::post('pages/article/{id}', 'PostController@index');

		Route::get('/{category_id}', 'PostController@viewpostofcat');

		Route::get('pages/category_blog', 'PostController@viewposts')->name('posts');
		
		Route::get('pages/categories', 'PostController@viewcat')->name('categories');
		Route::get('pages/about','PostController@about' )->name('about');
		Route::get('pages/contact','PostController@contact' )->name('contact');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



