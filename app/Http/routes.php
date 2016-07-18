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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function()
{

    Route::get('post/all', 'PostController@all');
    Route::get('teacher/all', 'TeacherController@all');
    Route::get('post/file/{id}', 'UploadController@queryID');
    Route::get('formdl/filters', 'FormdlController@formfilter');
    Route::get('formdl/all', 'FormdlController@all');
    Route::resource('filter', 'FilterController');
    Route::resource('formdata', 'FormdlController');
    Route::resource('formfilter', 'FormFilterController');
});


Route::group(['prefix' => 'admin'], function(){
  Route::any('', 'PostController@admin');
  Route::get('newpost', 'AdminController@newPost');
  Route::get('tc', 'TeacherController@view');
  Route::get('tc/new', 'AdminController@newTc');
  Route::get('res', 'AdminController@formdata');
  Route::get('res/new', 'AdminController@newFd');
});


Route::resource('post', 'PostController');
Route::resource('teacher', 'TeacherController');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('forms', function (){
  return View('downloads.forms');
});

Route::get('netres', function (){
  return View('downloads.netres');
});

Route::get('test', 'AdminController@test');
