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
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

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
        Route::get('netres/filters', 'NetresController@filters');
        Route::get('netres/all', 'NetresController@all');
        Route::get('paper/all', 'PaperController@all');
        Route::get('paper/allteacher', 'PaperController@allteacher');
        Route::get('act/all', 'PostController@act');
        Route::get('reg/all', 'RegController@all');
        Route::get('reg/filters', 'RegController@filters');
        Route::get('enroll/doctor', 'EnrollController@doctor');
        Route::get('enroll/master', 'EnrollController@master');
        Route::get('enroll/nightclass', 'EnrollController@nightclass');
        Route::get('enroll/exam', 'EnrollController@exam');

        Route::resource('filter', 'FilterController');
        Route::resource('formdata', 'FormdlController');
        Route::resource('formfilter', 'FormFilterController');
        Route::resource('netres', 'NetresController');
        Route::resource('resfilter', 'NetresFilterController');
        Route::resource('paper', 'PaperController');
        Route::resource('papert', 'PaperTController');
        Route::resource('teacher', 'TeacherController');
        Route::resource('reg', 'RegController');
        Route::resource('regfilter', 'RegFilterController');
        Route::resource('enroll', 'EnrollController');
    });


    Route::group(['prefix' => 'admin'], function(){
      Route::any('', 'PostController@admin');
      Route::get('newpost', 'AdminController@newPost');
      Route::get('tc', 'TeacherController@view');
      Route::get('tc/new', 'AdminController@newTc');
      Route::get('res', 'AdminController@formdata');
      Route::get('res/new', 'AdminController@newFd');
      Route::get('netres', 'AdminController@netres');
      Route::get('netres/new', 'AdminController@newNr');
      Route::get('paper', 'AdminController@paper');
      Route::get('reg', 'AdminController@reg');

      Route::get('paper/new', 'AdminController@newPaper');
    });


    Route::resource('post', 'PostController');
    Route::get('unit', function(){
      return View('unit.index');
    });

    Route::get('paper', function(){
      return View('paper.index');
    });
    Route::get('enroll', function(){
      return View('enroll.index');
    });

    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');

    Route::get('logout', 'Auth\AuthController@getLogout');

    Route::get('forms', function (){
      return View('downloads.forms');
    });

    Route::get('netres', function (){
      return View('downloads.netres');
    });

    Route::get('regulation', function (){
      return View('reg.index');
    });

    Route::get('teacher', function(){
      return View('teacher.index');
    });

});
