<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//$locale = slang::get();
$locale = null;

Route::group(array('before' => 'admin_panel', 'prefix' => 'admin'), function()
{

    Route::get('/', 'AdminController@mainPage');
    Route::controller('users', 'UsersController');
	Route::controller('pages', 'PagesController');
	Route::controller('languages', 'LangController');
	Route::controller('galleries', 'GalleriesController');
	Route::controller('settings', 'SettingsController');
	Route::controller('news', 'NewsController');
	Route::controller('temps', 'TempsController');
	Route::controller('groups', 'GroupsController');
	Route::controller('downloads', 'DownloadsController');

});

Route::group(array('prefix' => $locale), function()
{

	Route::get('login', array('before' => 'login', 'uses' => 'HomeController@loginPage'));
	Route::post('login', array('as' => 'login', 'uses' => 'HomeController@login'));
	Route::get('logout', 'HomeController@logout');

	Route::get('/{url}', 'HomeController@showPage');
	Route::get('/', 'HomeController@showPage');

});

