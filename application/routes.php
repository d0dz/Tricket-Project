<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', array('as'=>'home', 'uses'=>'transfers@index'));
Route::get('register', array('as'=>'register', 'uses'=>'users@new'));
Route::get('login', array('as'=>'login', 'uses'=>'users@login'));
Route::get('logout', array('as'=>'logout', 'uses'=>'users@logout'));

Route::get('localcourses', array('as'=>'localcourses', 'uses'=>'localcourses@index'));
Route::get('localcourse/(:num)', array('as'=>'localcourse', 'uses'=>'localcourses@view'));
Route::get('localcourses/new', array('as'=>'new_localcourses', 'uses'=>'localcourses@new'));
Route::get('localcourse/(:any)/edit', array('as'=>'edit_localcourses', 'uses'=>'localcourses@edit'));

Route::put('localcourse/update', array('uses'=>'localcourses@update'));
Route::delete('localcourse/delete', array('uses'=>'localcourses@destroy'));

Route::get('intercourses', array('as'=>'intercourses', 'uses'=>'intercourses@index'));
Route::get('intercourse/(:num)', array('as'=>'intercourse', 'uses'=>'intercourses@view'));
Route::get('intercourses/new', array('as'=>'new_intercourses', 'uses'=>'intercourses@new'));
Route::get('intercourse/(:any)/edit', array('as'=>'edit_intercourses', 'uses'=>'intercourses@edit'));

Route::put('intercourse/update', array('uses'=>'intercourses@update'));
Route::delete('intercourse/delete', array('uses'=>'intercourses@destroy'));

Route::get('universities', array('as'=>'universities', 'uses'=>'universities@index'));
Route::get('universities/new', array('as'=>'new_universities', 'uses'=>'universities@new'));
Route::get('universitie/(:any)/edit', array('as'=>'edit_universities', 'uses'=>'universities@edit'));

Route::put('universitie/update', array('uses'=>'universities@update'));
Route::delete('universitie/delete', array('uses'=>'universities@destroy'));

Route::post('register', array('before'=>'csrf', 'uses'=>'users@create'));
Route::post('login', array('before'=>'csrf', 'uses'=>'users@login'));

Route::post('localcourses/create', array('before'=>'csrf','uses'=>'localcourses@create'));
Route::post('universities/create', array('before'=>'csrf','uses'=>'universities@create'));
Route::post('intercourses/create', array('before'=>'csrf','uses'=>'intercourses@create'));


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});