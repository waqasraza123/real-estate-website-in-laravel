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

#The Site Routes

Route::get('/add_listing', ['as' => 'addListing' , 'uses' => 'HomeController@addListing']);



 #User Routes


Route::get('/account/{id}', ['as' => 'account' , 'uses' => 'HomeController@account']);
Route::get('account/listings/{id}', ['as' => 'accountListing' , 'uses' => 'HomeController@accountListing']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

        #Social Logins

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'SocialAuthController@googleRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'SocialAuthController@googleCallback']);



