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

Route::get('/', 'AdminController@index');
Route::get('/home', 'AdminController@index');
Route::get('add/voter', 'AdminController@index');
Route::post('add/voters', 'AdminController@create');
Route::get('candidate', 'CandidateController@index');
Route::post('add/candidate', 'CandidateController@create');
Route::get('view/result', 'ResultController@index');
Route::post('view/candidate_by_category', 'ResultController@index');
Route::get('votecand/{candid}/{candcatid}/{voterid}', 'VotersController@vote');
Route::get('viewcat/{catid}', 'VotersController@viewcat');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


 