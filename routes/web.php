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
// $prefix = config('config.prefix_123');
// $prefix= Config::get('config.prefix_123', 'hee'); 
// Config::get('key', 'default');


// Đăng nhập
Route::get('/login', 'LoginController@get_login');
Route::post('/login', 'LoginController@post_index');
	

$prefixAdmin = config('config.url.prefixAdmin');
$prefixNews =  config('config.url.prefixNews');
Route::group(['prefix' => $prefixAdmin],function(){
		$prefix          = '';  //admin
		$controllerName  = 'home';
		Route::group(['prefix' => $prefix],function() use($controllerName){
			$controller = ucfirst($controllerName).'Controller@';
            Route::get('/', ['as'=>$controllerName,'uses'=> $controller.'home']);
		});		
	// Route::get('/', 'HomeController@home');

//================================Slider===================================
	$prefix          = 'slider'; //admin/slider
	$controllerName  = 'slider';
	Route::group(['prefix' => $prefix],function() use($controllerName){
	$controller = ucfirst($controllerName).'Controller@';

	Route::get('/',  ['as'=>$controllerName  ,'uses'=> $controller.'list']);
	Route::get('/form',  ['as'=>$controllerName .'/form' ,'uses'=> $controller.'add']);
	Route::get('/edit/{id}',  ['as'=>$controllerName .'/edit' ,'uses'=> $controller.'edit'])->where('id','[0-9]+');
	Route::post('/save',  ['as'=>$controllerName .'/save' ,'uses'=> $controller.'save']);
	Route::get('/delete/{id}',  ['as'=>$controllerName .'/delete' ,'uses'=> $controller.'delete'])->where('id','[0-9]+');
	Route::get('change-status-{status}/{id}',  ['as'=>$controllerName .'/status' ,'uses'=> $controller.'status'])->where('id','[0-9]+');


	});	
								

   

//============================Category====================================\
	$prefix          = 'category';
	$controllerName  = 'category';
	Route::group(['prefix' => $prefix],function() use($controllerName){
	$controller = ucfirst($controllerName).'Controller@';

	Route::get('/',  ['as'=>$controllerName  ,'uses'=> $controller.'list']);
	Route::get('/form',  ['as'=>$controllerName .'/form' ,'uses'=> $controller.'add']);
	Route::get('/edit/{id}',  ['as'=>$controllerName .'/edit' ,'uses'=> $controller.'edit'])->where('id','[0-9]+');
	Route::post('/save',  ['as'=>$controllerName .'/save' ,'uses'=> $controller.'save']);
	Route::get('/delete/{id}',  ['as'=>$controllerName .'/delete' ,'uses'=> $controller.'delete'])->where('id','[0-9]+');
	Route::get('change-status-{status}/{id}',  ['as'=>$controllerName .'/status' ,'uses'=> $controller.'status'])->where('id','[0-9]+');
    Route::get('change-isHome-{is_home}/{id}',  ['as'=>$controllerName .'/is_home' ,'uses'=> $controller.'is_home'])->where('id','[0-9]+');
	Route::get('change-display-{display}/{id}',  ['as'=>$controllerName .'/display' ,'uses'=> $controller.'display'])->where('id','[0-9]+');



	});	



//============================Articles====================================\
$prefix          = 'articles';
$controllerName  = 'articles';
Route::group(['prefix' => $prefix],function() use($controllerName){
$controller = ucfirst($controllerName).'Controller@';

Route::get('/',  ['as'=>$controllerName  ,'uses'=> $controller.'list']);
Route::get('/form',  ['as'=>$controllerName .'/form' ,'uses'=> $controller.'add']);
Route::get('/edit/{id}',  ['as'=>$controllerName .'/edit' ,'uses'=> $controller.'edit'])->where('id','[0-9]+');
Route::post('/save',  ['as'=>$controllerName .'/save' ,'uses'=> $controller.'save']);
Route::get('/delete/{id}',  ['as'=>$controllerName .'/delete' ,'uses'=> $controller.'delete'])->where('id','[0-9]+');
Route::get('change-status-{status}/{id}',  ['as'=>$controllerName .'/status' ,'uses'=> $controller.'status'])->where('id','[0-9]+');
Route::get('change-isHome-{is_home}/{id}',  ['as'=>$controllerName .'/is_home' ,'uses'=> $controller.'is_home'])->where('id','[0-9]+');
Route::get('change-display-{display}/{id}',  ['as'=>$controllerName .'/display' ,'uses'=> $controller.'display'])->where('id','[0-9]+');
Route::get('change-type-{type}/{id}',  ['as'=>$controllerName .'/type' ,'uses'=> $controller.'type'])->where('id','[0-9]+');



});
//============================Articles====================================\
$prefix          = 'users';
$controllerName  = 'users';
Route::group(['prefix' => $prefix],function() use($controllerName){
$controller = ucfirst($controllerName).'Controller@';

Route::get('/',  ['as'=>$controllerName  ,'uses'=> $controller.'list']);
Route::get('/form',  ['as'=>$controllerName .'/form' ,'uses'=> $controller.'add']);
Route::get('/edit/{id}',  ['as'=>$controllerName .'/edit' ,'uses'=> $controller.'edit'])->where('id','[0-9]+');
Route::post('/save',  ['as'=>$controllerName .'/save' ,'uses'=> $controller.'save']);
Route::get('/delete/{id}',  ['as'=>$controllerName .'/delete' ,'uses'=> $controller.'delete'])->where('id','[0-9]+');
Route::get('change-status-{status}/{id}',  ['as'=>$controllerName .'/status' ,'uses'=> $controller.'status'])->where('id','[0-9]+');
Route::get('change-level-{level}/{id}',  ['as'=>$controllerName .'/level' ,'uses'=> $controller.'level'])->where('id','[0-9]+');




});

});	

Route::group(['prefix' => $prefixNews],function(){
	$prefix          = ''; //new/
	$controllerName  = 'home';
	Route::group(['prefix' => $prefix],function() use($controllerName){
		$controller = ucfirst($controllerName).'Controller@';
	Route::get('/', ['as'=>$controllerName,'uses'=> $controller.'index']);
	});	
	Route::get('/123', 'HomeController@test');	



});	

