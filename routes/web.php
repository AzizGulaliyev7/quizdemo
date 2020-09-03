<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/teacher/{id}', 'HomeController@show')->name('teacher.show');
Route::get('/test/{id}', 'HomeController@test')->name('test.show');
Route::post('/test', 'HomeController@store')->name('test.store');
Route::get('/result/{testid}', 'HomeController@result')->name('result.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});



Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware'=>'admin'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/tests', 'TestsController');
    Route::get('question/{testid}', 'QuestionsController@create')->name('questions.quest');
    Route::resource('/questions', 'QuestionsController');
    Route::resource('/users', 'UsersController');
    Route::get('results', 'ResultsController@index1')->name('results.index');
    Route::get('results/{id}', 'ResultsController@index2')->name('results.list');

});
