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
Route::get('language','Api\LanguageController@index');
Route::get('level','Api\LevelController@index');
Route::get('course','Api\CourseController@index');
