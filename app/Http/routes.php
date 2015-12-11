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

Route::get('{project_name}/issue/create', 'IssuesController@createIssue');

/*Route::post('{project_name}/issue/create', [
  'middleware' => 'auth',
  'uses' => 'IssuesController@storeIssue'
]);*/

Route::post('{project_name}/issue/create', 'IssuesController@storeIssue');


// show an issue.
Route::get('{project_name}/issue/{case}', 'IssuesController@showIssue');


// create a new project
Route::get('project/create', [
  'middleware' => 'auth',
  'uses' => 'ProjectController@createProject'
]);


Route::post('project/create', [
  'middleware'   => 'auth',
  'uses'         => 'ProjectController@storeProject'  
]);


// Auth
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



/*** API ***/

Route::get('/api/projects', 'ProjectController@index'); // get all projects
Route::post('/api/project', 'ProjectController@store'); // store one project

Route::get('/api/project/{project_name}', 'ProjectController@show');

// Issue
Route::get('/api/project/{project_name}/issues', 'IssuesController@index');
Route::get('/api/project/{project_name}/issues/{case}', 'IssuesController@show');
Route::post('api/project/{project_name}/issues/{case}', 'IssuesController@store');