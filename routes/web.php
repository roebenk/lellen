<?php

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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', function() {
		return redirect('users');
	});
	Route::resource('games', 'GameController', ['only' => ['index', 'create', 'store']]);
	Route::resource('users', 'UserController', ['only' => ['index', 'show', 'edit', 'update']]);
	Route::resource('achievements', 'AchievementController', ['only' => ['index']]);

	Route::get('test', 'HomeController@test');
});