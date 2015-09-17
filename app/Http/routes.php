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

Route::get('/', 'ArticlesController@index');



Route::get('contact', function(){

	return 'Joel Jeremy M. Marquez/09168882716/joeljeremy.marquez@gmail.com';

});

Route::get('about', 'PagesController@about');



Route::resource('articles', 'ArticlesController');
Route::post('articles/{id}/approve', 'ArticlesController@approve');
Route::post('articles/{id}/unapprove', 'ArticlesController@unapprove');



Route::resource('articles.comments', 'ArticleCommentsController', ['except' => ['index','create','show','destroy']]);
Route::get('articles/{article_id}/comments/{comment_id}/destroy', 'ArticleCommentsController@destroy');



Route::resource('users','UsersController',['except' => ['show','create','edit']]);
Route::get('users/{id}/destroy', 'UsersController@destroy');
Route::get('users/search/{column}/{id}/{department}/{order}','UsersController@search');


Route::resource('slider','SliderObjectsController', ['except' => 'show' ]);



Route::resource('profiles', 'ProfilesController');
Route::get('profiles/search/{name}', 'ProfilesController@search');



Route::resource('threads', 'ThreadsController', ['except' => 'destroy']);
Route::get('threads/{id}/destroy', 'ThreadsController@destroy');
Route::resource('threads.comments', 'ThreadCommentsController', ['except' => ['index','create','show','destroy']]);
Route::get('threads/{thread_id}/comments/{comment_id}/destroy', 'ThreadCommentsController@destroy');



Route::get('survey','SurveysController@index');
Route::get('survey/list','SurveysController@list_survey');
Route::post('survey/profiles','SurveysController@save_profile');
Route::post('survey/educational_attainments/{num}','SurveysController@store_educational_attainments');
Route::post('survey/professional_exams_passed/{num}','SurveysController@store_professional_exams_passed');
Route::post('survey/training_or_advanced_studies/{num}','SurveysController@store_training_or_advanced_studies');
Route::post('survey/employment_data/{choice}','SurveysController@store_employment_data');
Route::get('survey/{id}','SurveysController@show');

Route::get('employment_data/{id}/edit','SurveysController@edit_employment_data');
Route::post('employment_data/{id}/update','SurveysController@update_employment_data');




Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');






Route::get('get/photo/{url}/{name}', ['as' => 'getPhoto',

	function($url,$name){

	$url_array = explode('.',$url);

	$storage_app_path = storage_path('app');

	$path = $storage_app_path;


		for ($i = 0; $i < count($url_array); $i++) {

			$path .= '/'.$url_array[$i];

		}

		//Append name to image path
		$path .= '/'.$name;



		if (!File::exists($path) && $url_array[0] === 'articles') {

			return Image::make($storage_app_path.'/articles/default.jpg')->response('jpg');

		} else if (!File::exists($path) && $url_array[0] === 'profiles') {

			return Image::make($storage_app_path.'/profiles/default.jpg')->response('jpg');

		}

	return Image::make($path)->response();

}]);


Route::get('get/view/{model}/{user_id}/{name}',['as' => 'getView',

	function($model,$user_id,$name){

	$user = App\User::findOrFail($user_id);

	if ($model === 'profile') {

		$profile = $user->profile;

		return view($name,compact('profile'));

	} else if ($model === 'threads') {

		$threads = $user->threads;

		return view($name,compact('threads'));

	} else if ($model === 'employment_data') {

		$employment_data = $user->employment_data;

		return view($name,compact('employment_data'));

	}

}]);


