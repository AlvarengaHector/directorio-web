<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'users' => 'UsersController',
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => 'Admin'], function(){

	Route::resource('users', 'UsersController');
	Route::resource('files', 'FilesController');
	Route::resource('photos', 'FilesController@photos');
	Route::resource('consultas', 'ConsultasController');

	Route::get('storage/{archivo}', function ($archivo) {
	     $storage_path = storage_path();
	     $url = $storage_path.'/files/'.$archivo;
	     //verificamos si el archivo existe y lo retornamos
	     if (Storage::exists($archivo))
	     {
	       return response()->download($url);
	     }
	     //si no se encuentra lanzamos un error 404.
	     abort(404);
	});

});


Route::group(['prefix' => 'page', 'middleware' => 'auth'], function(){

	Route::resource('files', 'FilesController');
	Route::resource('photos', 'FilesController@photos');
	Route::resource('profile', 'UsersProfileController');
	// Route::get('consultas', ['as' => 'ask', 'uses' => 'ConsultasController@index']);
	Route::post('send', ['as' => 'send', 'uses' => 'ConsultasController@send'] );
	Route::post('send_picture/{user}', ['as' => 'send_picture', 'uses' => 'UsersProfileController@picture']);

	Route::get('viewer/{files}/pdf', ['as' => 'pdf_viewer', 'uses' => 'FilesController@pdfViewer']);



	Route::get('storage/{archivo}', function ($archivo) {
	     $storage_path = storage_path();
	     $url = $storage_path.'/files/'.$archivo;
	     //verificamos si el archivo existe y lo retornamos
	     if (Storage::exists($archivo))
	     {
	       return response()->download($url);
	     }
	     //si no se encuentra lanzamos un error 404.
	     abort(404);
	});

	// usage inside a laravel route
	Route::get('/cut/{archivo}', function($archivo)
	{
		$storage_path = storage_path();
		$url = $storage_path.'/files/'.$archivo;
		$watermark = $storage_path.'/files/watermark.png';

		$img = Image::make($url)->fit(36);

		// $img = Image::make($url)->resize(50, 50)->insert($watermark);
		// $img = Image::canvas(50, 50, '#ccc');

	    return $img->response($img->extension);
	});

});

