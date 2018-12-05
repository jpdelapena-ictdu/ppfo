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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Building Routes
Route::resource('building', 'BuildingController');


//Personnel Routes
Route::prefix('personnel')->group(function () {
  Route::get('/', 'PersonnelController@dashboard')->name('personnel.dashboard');
  Route::get('index', 'PersonnelController@index')->name('personnel.index');
  Route::post('register', 'PersonnelController@store')->name('personnel.store');
  Route::match(['put','patch'],'personnel/update/{id}', 'PersonnelController@update')->name('personnel.update');
  Route::get('login', 'Auth\PersonnelLoginController@login')->name('personnel.auth.login');
  Route::post('login', 'Auth\PersonnelLoginController@loginpersonnel')->name('personnel.auth.loginPersonnel');
  Route::post('logout', 'Auth\PersonnelLoginController@logout')->name('personnel.auth.logout');
});

//Room Routes
Route::resource('room', 'RoomController');

//Item Routes
Route::resource('item', 'ItemController');

//Inventory Routes
Route::resource('inventory', 'InventoryController');