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
    return view('Auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('addRdv',function(){
  return view('addRdv');
})->name('addRdv');

Route::get('deleteRdv/{id}','RdvsController@delete');

Route::post('/addRdv', 'RdvsController@create');
Route::post('/editRdv/{rdv}', 'RdvsController@update');