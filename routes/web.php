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

//Route::get('/home_user', 'User@index');
Route::get('/',function(){
	return redirect()->route('login');
});
Route::get('/login', 'User@login')->name('login');
Route::post('/loginPost', 'User@loginPost');
Route::get('/register', 'User@register');
Route::post('/registerPost', 'User@registerPost');


/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/getDataUser','User@getDataUser');

Auth::routes();
Route::middleware('login_api')->group(function(){
	Route::get('/home_user', 'User@home_user')->name('home_user');
	Route::post('/logout_api', 'User@logout');
});