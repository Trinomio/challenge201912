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
Route::apiResource('peoples','Api\PeopleController');
Route::get('languages','Api\LanguageController@index');
Route::get('levels','Api\LevelController@index');
Route::get('courses','Api\CourseController@index');
