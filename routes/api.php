<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('people','Api\PeopleController@index');
Route::get('people/{people_id}','Api\PeopleController@show');
Route::post('people','Api\PeopleController@store');
Route::put('people/{people_id}','Api\PeopleController@update');
Route::delete('people/{people_id}','Api\PeopleController@destroy');
Route::get('language','Api\LanguageController@index');
Route::get('level','Api\LevelController@index');
Route::get('course','Api\CourseController@index');
