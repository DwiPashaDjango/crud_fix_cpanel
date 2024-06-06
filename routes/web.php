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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('/auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/read_notif/{id}', 'HomeController@read_notif')->name('read_notif');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('/user.index1', 'UserController@index1')->name('users.index1');
});

Route::resource('dashboard', 'DashboardController');
Route::get('/dashboard.index0', 'DashboardController@index0')->name('dashboard.index0');
Route::get('/dashboard.index0/{filter_by}/{selected}', 'DashboardController@index_by')->name('dashboard.index_by');

Route::resource('data', 'DataController');
Route::post('/data.import_excel', 'DataController@import_excel');
Route::get('/data.export_excel', 'DataController@export_excel');
Route::get('/data.deleteAll', 'DataController@deleteAll')->name('data.deleteAll');


Route::resource('sloc', 'SLocController');
Route::get('/sloc.index1', 'SLocController@index1')->name('sloc.index1');
Route::get('/sloc.index2', 'SLocController@index2')->name('sloc.index2');
Route::get('/sloc.dashboard', 'SLocController@dashboard')->name('sloc.dashboard');
Route::post('/sloc.import_excel', 'SLocController@import_excel');
Route::get('/sloc.export_excel', 'SLocController@export_excel');
Route::get('/sloc.exportByMonth', 'SLocController@exportByMonth');
Route::get('/sloc.export_evident', 'SLocController@export_evident');
Route::get('/sloc.edit000.{id}', 'SLocController@edit000')->name('sloc.edit000');
Route::get('/sloc.edit003.{id}', 'SLocController@edit003')->name('sloc.edit003');
Route::get('/sloc.edit007.{id}', 'SLocController@edit007')->name('sloc.edit007');
Route::get('/sloc.edit009.{id}', 'SLocController@edit009')->name('sloc.edit009');
Route::get('/sloc.edit017.{id}', 'SLocController@edit017')->name('sloc.edit017');
Route::put('/sloc/update000/{id}', 'SLocController@update000')->name('sloc.update000');
Route::put('/sloc/update003/{id}', 'SLocController@update003')->name('sloc.update003');
Route::put('/sloc/update007/{id}', 'SLocController@update007')->name('sloc.update007');
Route::put('/sloc/update009/{id}', 'SLocController@update009')->name('sloc.update009');
Route::put('/sloc/update017/{id}', 'SLocController@update017')->name('sloc.update017');
Route::get('/sloc.views.{id}', 'SLocController@views')->name('sloc.views');
Route::get('/sloc.views2.{id}', 'SLocController@views2')->name('sloc.views2');
Route::get('/sloc.views3.{id}', 'SLocController@views3')->name('sloc.views3');

Route::get('/sloc.deleteAll', 'SLocController@deleteAll')->name('sloc.deleteAll');

Route::resource('stores', 'StoreController');
Route::get('/stores.index0', 'StoreController@index0')->name('stores.index0');
Route::post('/stores.import_excel', 'StoreController@import_excel');
Route::get('/stores.deleteAll', 'StoreController@deleteAll')->name('stores.deleteAll');
Route::get('/stores.export_excel', 'StoreController@export_excel');

Route::get('send-notification', 'EmailNotifController@sendNotification');

// new url chart sloc 1
Route::get('/get-sloc-trend', 'SLocController@getSlocTrend')->name('sloc.get.sloc.trend');
