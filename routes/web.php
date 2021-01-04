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

Route::get('/', 'CoursesController@index');

//ユーザー登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//認証
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//お問い合わせ
Route::get('contact', 'ContactsController@index')->name('contact.get');
Route::post('contact/confirm', 'ContactsController@confirm')->name('contact/confirm.post');
Route::post('contact/complete', 'ContactsController@complete')->name('contact/confirm.post');

//検索機能
Route::get('search', 'SearchController@index')->name('search');

Route::group(['middleware' => ['auth']], function (){
    Route::group(['prefix' => 'user/{id}'], function (){
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
        Route::get('reports', 'CoursesController@reports')->name('users.reports');
        // Route::post('profile', 'ProfileController@create')->name('users.profile');
        Route::get('profile', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile', 'ProfileController@update')->name('profile.update');
        
        
    });
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('courses', 'CoursesController', ['only' => ['create', 'store','destroy']]);
    Route::resource('profile', 'ProfileController',['only' => ['create', 'store','index']]);
    
    Route::group(['prefix' => 'course/{id}'], function() {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
});




    