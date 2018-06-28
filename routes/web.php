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

Route::resource('/','IndexController',[
	'only'  => ['index'],
	'names' => [
		'index' => 'home'
	]
]);


Route::resource('portfolios','PortfolioController',[
	'parametrs' =>[
		'portfolios' => 'alias'
	]
]);

Route::resource('articles','ArticlesController',[
'parametrs'=>[
		'articles' =>'alias'
	]
]);

Route::get('articles/cat/{cat_alias?}',['users'=>'ArticlesController@index','as'=>'articlesCat']);