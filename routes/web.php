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

Route::get('/', 'HomeController@homePage');


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
Route::get('account/favorites/{id}', ['as' => 'accountFavorites' , 'uses' => 'HomeController@accountFavorites']);
Route::get('account/saved_searches/{id}', ['as' => 'accountSavedSearches' , 'uses' => 'HomeController@accountSavedSearches']);
Route::get('account/notification_settings/{id}', ['as' => 'userNotification' , 'uses' => 'HomeController@userNotification']);
Route::post('update_profile', ['as' => 'updateProfile' , 'uses' => 'HomeController@updateProfile']);
Route::post('save_search', ['as' => 'saveSearch' , 'uses' => 'HomeController@saveSearch']);
Route::post('save_user_notification', ['as' => 'saveUserNotify' , 'uses' => 'HomeController@saveUserNotify']);
Route::post('send_mail_to_client', ['as' => 'mailToClient' , 'uses' => 'HomeController@mailToClient']);



 #Listing Routes

Route::get('/add_listing', ['as' => 'addListing' , 'uses' => 'HomeController@addListing']);
Route::get('listing/{id}' , ['as' => 'singleListing' , 'uses' => 'ListingController@singleListing']);
Route::post('submit_listing' , ['as' => 'submitListing' , 'uses' => 'ListingController@submitListing']);
Route::get('edit_listing/{id}' , ['as' => 'editListing' , 'uses' => 'ListingController@editListing']);
Route::post('edit_listing' , ['as' => 'postEditListing' , 'uses' => 'ListingController@postEditListing']);
Route::get('delete_listing/{id}' , ['as' => 'deleteListing' , 'uses' => 'ListingController@deleteListing']);
Route::get('add_favorite/{user_id}/{listing_id}' , ['as' => 'addFavorite' , 'uses' => 'ListingController@addFavorite']);
Route::post('search_listing' , ['as' => 'searchListing' , 'uses' => 'ListingController@searchListing']);
Route::post('search_listing_ajax' , ['as' => 'searchListingAjax' , 'uses' => 'ListingController@searchListingAjax']);
Route::post('search_listing_user_profile', ['as' => 'searchSavedSeraches' , 'uses' => 'ListingController@searchSavedSeraches']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

        #Social Logins

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'SocialAuthController@googleRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'SocialAuthController@googleCallback']);



