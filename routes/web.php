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

Route::get('/', function () { return view('welcome'); });
Route::get('/auth/register', 'Auth\RegisterController@showRegister');
Route::get('/auth/reset', 'Auth\RegisterController@showReset');
Route::get('/auth/account-created', 'Auth\RegisterController@createSuccess');
Route::post('/password/reset',array('uses' => 'Auth\RegisterController@doReset'));
Route::post('/dologin',array('uses' => 'LoginController@doLogin'));

Route::group(['middleware' => 'auth'], function () {
    Route::get('/campaign/create-ad', 'CampaignController@createAd');
    Route::post('/campaign/create-ad', 'CampaignController@submitAd');
    Route::post('/campaign/update-ad', 'CampaignController@updateAd');
    Route::get('/campaign/show-ad', 'CampaignController@showAd');
    Route::get('/campaign/delete-ad/{cid}', 'CampaignController@deleteAd');
    Route::get('/support', 'CampaignController@contactSupport');
});