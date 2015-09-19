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
Route::get('about', 'PagesController@about');

Route::resource('articles', 'ArticlesController');
Route::post('articles/{id}/approve', 'ArticlesController@approve');
Route::post('articles/{id}/unapprove', 'ArticlesController@unapprove');

Route::resource('articles.comments', 'ArticleCommentsController', ['except' => ['index','create','show','destroy']]);
Route::get('articles/{article_id}/comments/{comment_id}/destroy', 'ArticleCommentsController@destroy');

Route::resource('users','UsersController',['except' => ['show','create','edit']]);
Route::get('users/search/{column}/{id}/{department}/{order}','UsersController@search');
Route::get('users/{id}/destroy', 'UsersController@destroy');

Route::resource('slider','SliderObjectsController', ['except' => 'show']);

Route::resource('profiles', 'ProfilesController', ['except' => 'create']);
Route::get('profiles/search/{name}', 'ProfilesController@search');

Route::resource('threads', 'ThreadsController', ['except' => 'destroy']);
Route::get('threads/{id}/destroy', 'ThreadsController@destroy');

Route::resource('threads.comments', 'ThreadCommentsController', ['except' => ['index','create','show','destroy']]);
Route::get('threads/{thread_id}/comments/{comment_id}/destroy', 'ThreadCommentsController@destroy');

Route::get('survey','SurveysController@index');
Route::get('survey/list','SurveysController@listSurvey');
Route::get('survey/list/filter/{department}','SurveysController@filterByDepartment');
Route::get('survey/{id}','SurveysController@show');

Route::post('survey/profiles','SurveysController@storeProfile');
Route::post('survey/educational_attainments/{num}','SurveysController@storeEducationalAttainments');
Route::post('survey/professional_exams_passed/{num}','SurveysController@storeProfessionalEexamsPassed');
Route::post('survey/trainings_or_studies/{num}','SurveysController@storeTrainingsOrStudies');
Route::post('survey/employment_data/{choice}','SurveysController@storeEmploymentData');

Route::get('employment_data/{id}/edit','SurveysController@editEmploymentData');
Route::post('employment_data/{id}/update','SurveysController@updateEmploymentData');

//Login
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

//Register
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Logout
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('get/photo/{url}/{name}', ['as' => 'getPhoto',

	function($url,$name){

	$url_array = explode('.',$url);

	$storage_path = storage_path('app');

	$path = $storage_path;


		for ($i = 0; $i < count($url_array); $i++) {

			$path .= '/'.$url_array[$i];

		}

		//Append name to image path
		$path .= '/'.$name;



		if (!File::exists($path)) {

			return Image::make($storage_path.'/'.$url_array[0].'/default.jpg')->response('jpg');

		}

	return Image::make($path)->response();

}]);


Route::get('get/view/{model}/{id}/{name}',['as' => 'getView',

	function($model,$id,$name){

	$user = App\User::findOrFail($id);

	$obj = $user->$model;

	return view($name,[$model => $obj]);


}]);

Route::get('dev', function(){

	return 'For more projects like this, please contact me and we shall talk ;) <br/><br/>
			Joel Jeremy M. Marquez<br/>
			09168882716<br/>
			joeljeremy.marquez@gmail.com or<br/>
			marquez_joeljeremy@yahoo.com<br/><br/>
			Thank you!';

});

