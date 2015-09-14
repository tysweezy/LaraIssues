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
    return 'Welcome to issues';
});


/*** API ***/

Route::get('/api/project', 'ProjectController@index');
Route::post('/api/project', 'ProjectController@store');

Route::get('/api/project/issues', 'IssueController@index');
Route::post('/api/project/issues', 'IssueController@store');
