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

Route::get('/', 'ProjectController@getAll');
// Software default routes --  @todo

Route::get('{project_name}', 'ProjectController@showProject');




/*** API ***/

Route::get('/api/projects', 'ProjectController@index'); // get all projects
Route::post('/api/project', 'ProjectController@store'); // store one project

Route::get('/api/project/{project_name}', 'ProjectController@show');

// Issue
Route::get('/api/project/{project_name}/issues', 'IssuesController@index');
Route::get('/api/project/{project_name}/issues/{case}', 'IssuesController@show');
Route::post('api/project/{project_name}/issues/{case}', 'IssuesController@store');