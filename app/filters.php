<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

App::error(function(Exception $exception, $code){

    if ( ! in_array($code,array(403,404))){
       return;
    }

    switch ($code) {

		case 403:
		return 'access denied!';

		case 404:
		if(slink::segment(1) == 'admin' && allow::to('admin_panel'))
		{
			return View::make('admin.error404');
			exit;
		} else {
			if(Page::where('url', '404')->exists())
			{
				return spage::show('404');
			} else {
				return "Page is not found, and 'Page 404' has not been created. That is why you see this page<br>Egg CMS. <a href='//grapheme.ru' style='color: #cacaca;' target='_blank'>Grapheme.ru</a>";
			}
		}

   }

});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return App::abort(404);
});

Route::filter('login', function()
{
	if (Auth::check()) return Redirect::to('admin');
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Permission Filter
|--------------------------------------------------------------------------
*/

//allow::autoFilters();

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});