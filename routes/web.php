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


Route::get('/setlang/{lang}', function($lang)
{
    Session::put('locale', $lang);
    App::setLocale($lang);
    return  redirect()->back();
});



#The Site Routes





 #User Routes


Route::get('/account/{id}', ['as' => 'account' , 'uses' => 'HomeController@account']);
Route::get('account/listings/{id}', ['as' => 'accountListing' , 'uses' => 'HomeController@accountListing']);


 #Listing Routes

Route::get('/add_listing', ['as' => 'addListing' , 'uses' => 'HomeController@addListing']);
Route::post('submit_listing' , ['as' => 'submitListing' , 'uses' => 'ListingController@submitListing']);
Route::get('edit_listing/{id}' , ['as' => 'editListing' , 'uses' => 'ListingController@editListing']);
Route::post('edit_listing' , ['as' => 'postEditListing' , 'uses' => 'ListingController@postEditListing']);
Route::get('delete_listing/{id}' , ['as' => 'deleteListing' , 'uses' => 'ListingController@deleteListing']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

        #Social Logins

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'SocialAuthController@googleRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'SocialAuthController@googleCallback']);



