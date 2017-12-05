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

Route::get('/', 'HomeController@homePage')->name('homes');


Route::get('/setlang/{lang}', function($lang)
{
    Session::put('locale', $lang);
    App::setLocale($lang);
    return  redirect()->back();
});



#The Site Routes


Route::get('test' , function(){
    echo null || "hello";
});


 #User Routes


Route::get('/account/{id}', ['as' => 'account' , 'uses' => 'HomeController@account']);
Route::get('account/listings/{id}', ['as' => 'accountListing' , 'uses' => 'HomeController@accountListing']);
Route::get('account/dashboard/{id}', ['as' => 'accountDashboard' , 'uses' => 'HomeController@accountDashboard']);
Route::get('account/savedListings/{id}', ['as' => 'savedListings' , 'uses' => 'HomeController@savedListings']);
Route::get('account/favorites/{id}', ['as' => 'accountFavorites' , 'uses' => 'HomeController@accountFavorites']);
Route::get('account/saved_searches/{id}', ['as' => 'accountSavedSearches' , 'uses' => 'HomeController@accountSavedSearches']);
Route::get('account/notification_settings/{id}', ['as' => 'userNotification' , 'uses' => 'HomeController@userNotification']);
Route::post('update_profile', ['as' => 'updateProfile' , 'uses' => 'HomeController@updateProfile']);
Route::post('save_search', ['as' => 'saveSearch' , 'uses' => 'HomeController@saveSearch']);
Route::post('save_user_notification', ['as' => 'saveUserNotify' , 'uses' => 'HomeController@saveUserNotify']);
Route::post('send_mail_to_client', ['as' => 'mailToClient' , 'uses' => 'HomeController@mailToClient']);


    #Terms and Statements routes

Route::get('terms_of_service' , ['as' => 'termOfService' , 'uses' => 'HomeController@termOfService']);
Route::get('add-a-listing-terms-of-service' , ['as' => 'addAListingTerms' , 'uses' => 'HomeController@addAListingTerms']);
Route::get('equal_opportunity' , ['as' => 'equalOpportunity' , 'uses' => 'HomeController@equalOpportunity']);



 #Listing Routes

Route::get('/add_listing', ['as' => 'addListing' , 'uses' => 'HomeController@addListing'])->middleware('auth');
Route::post('/save_listing', ['as' => 'saveListing' , 'uses' => 'ListingController@saveListing'])->middleware('auth');
Route::get('listing/{id}/{title}' , ['as' => 'singleListing' , 'uses' => 'ListingController@singleListing']);
Route::post('submit_listing' , ['as' => 'submitListing' , 'uses' => 'ListingController@submitListing']);
Route::get('edit_listing/{id}' , ['as' => 'editListing' , 'uses' => 'ListingController@editListing'])->middleware('auth');
Route::post('edit_listing' , ['as' => 'postEditListing' , 'uses' => 'ListingController@postEditListing']);
Route::get('delete_listing/{id}' , ['as' => 'deleteListing' , 'uses' => 'ListingController@deleteListing']);
Route::get('add_favorite/{user_id}/{listing_id}' , ['as' => 'addFavorite' , 'uses' => 'ListingController@addFavorite']);
Route::get('search_listing' , ['as' => 'searchListing' , 'uses' => 'ListingController@searchListing']);
Route::post('search_listing_ajax' , ['as' => 'searchListingAjax' , 'uses' => 'ListingController@searchListingAjax']);
Route::post('search_listing_user_profile', ['as' => 'searchSavedSeraches' , 'uses' => 'ListingController@searchSavedSeraches']);
Route::get('delete_listing_images/{id}', ['as' => 'delListingImages' , 'uses' => 'ListingController@delListingImages']);
Route::post('write_rewievs' , ['as' => 'writeReviews' , 'uses' => 'ListingController@writeReviews']);
Route::post('delete_rewievs' , ['as' => 'deleteReviews' , 'uses' => 'ListingController@deleteReviews']);
Route::get('choose_type' , ['as' => 'chooseType' , 'uses' => 'ListingController@chooseType'])->middleware('auth');
Route::get('agent_form' , ['as' => 'agentForm' , 'uses' => 'ListingController@agentForm'])->middleware('auth');
Route::post('agent_form_post' , ['as' => 'PostagentForm' , 'uses' => 'ListingController@PostagentForm'])->middleware('auth');
Route::get('make_featured_iamge/{id}/{listing_id}' , ['as' => 'makeFeatureImage' , 'uses' => 'ListingController@makeFeatureImage' ]);

    #Agent Routes

Route::get('payment/{type}' , ['as' => 'payment'  , 'uses' => 'ListingController@payment']);
Route::get('agent_form_listing' , ['as' => 'getAgentForm' , 'uses' => 'ListingController@getAgentForm']);
Route::post('agent_submit_listing' , ['as' => 'submitAgentListing' , 'uses' => 'ListingController@submitAgentListing']);
Route::get('email_to_agent/{email}' , ['as' => 'emailToAgent' , 'uses' => 'ListingController@emailToAgent']);
Route::get('send_link_agent' , ['as' => 'sendLinkToAgent' , 'uses' => 'ListingConteoller@sendLinkToAgent']);


#Zip Codes

Route::get('insert-zip-codes', ['as' => 'insertZipCode' , 'uses' => 'ZipcodeController@insertZipCode']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

        #Social Logins

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'SocialAuthController@googleRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'SocialAuthController@googleCallback']);


        #Admin Routes

Route::get('/admin' , ['as' => 'adminLogin' , 'uses' => 'AdminController@index']);
Route::post('/admin_login' , ['as' => 'adminPostLogin' , 'uses' => 'AdminController@adminPostLogin']);

Route::group(['middleware' => 'admin.only'], function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/home' , ['as' => 'adminHome' , 'uses' => 'AdminController@adminHome']);

            /*Users Controlling*/

        Route::get('/users' , ['as' => 'admUsers' , 'uses' => 'AdminController@admUsers']);
        Route::get('/users/create' , ['as' => 'admUsersCreate' , 'uses' => 'AdminController@admUsersCreate']);
        Route::post('/users/create' , ['as' => 'postadmUsersCreate' , 'uses' => 'AdminController@postadmUsersCreate']);
        Route::get('/users/edit/{id}' , ['as' => 'admEditUsers' , 'uses' => 'AdminController@admEditUsers']);
        Route::get('/users/delete/{id}' , ['as' => 'admDeleteUsers' , 'uses' => 'AdminController@admDeleteUsers']);
        Route::post('edit_users' , ['as' => 'postEditUser' , 'uses' => 'AdminController@postEditUser' ]);

            /*Logo */

        Route::get('logo' , ['as' => 'admLogo'  , 'uses' => 'AdminController@admLogo']);
        Route::post('logo' , ['as' => 'admPostLogo'  , 'uses' => 'AdminController@admPostLogo']);


            /*Footer Contact Us Section*/

        Route::get('/footer' , ['as' => 'admFooter' , 'uses' => 'AdminController@admFooter']);
        Route::post('/footer' , ['as' => 'admPostFooter' , 'uses' => 'AdminController@admPostFooter']);


            /*Listing delete Edit*/


        Route::get('/listing' , ['as' => 'admListing' , 'uses' => 'AdminController@admListing']);
        Route::get('/listing/edit/{id}'  , ['as' => 'admEditListing'  , 'uses' => 'AdminController@admEditListing']);
        Route::post('/listing/edit'  , ['as' => 'admPostEditListing'  , 'uses' => 'AdminController@admPostEditListing']);
        Route::get('/listing/delete/{id}' , ['as' => 'admDeleteListing' , 'uses' => 'AdminController@admDeleteListing']);

            /*Slider Images Area*/

        Route::get('/slder_images' , ['as' => 'admSliderImages' , 'uses' => 'AdminController@admSliderImages']);
        Route::post('/slder_images/updload' , ['as' => 'admPostSliderImages' , 'uses' => 'AdminController@admPostSliderImages']);
    });
});






