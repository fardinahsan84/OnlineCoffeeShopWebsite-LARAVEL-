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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', 'LoginController@index');
Route::post('/login','LoginController@verify');

Route::get('/logout', 'LogoutController@index')->name('logout.index');

Route::middleware(['ses'])->group(function(){
    Route::middleware(['type'])->group(function(){
          Route::get('/manager', 'ManagerController@index')->name('manager.index');

          Route::get('/manager/editProfile/{id}', 'ManagerController@editProfile')->name('manager.editProfile');
          Route::post('/manager/editProfile/{id}', 'ManagerController@updateProfile');

          Route::get('/manager/add', 'ManagerController@add')->name('manager.add');
          Route::post('/manager/add', 'ManagerController@insert');

          Route::get('/manager/allFood', 'ManagerController@allFood')->name('manager.allFood');

          Route::get('/manager/allDeliveryMan', 'ManagerController@allDeliveryMan')->name('manager.allDeliveryMan');

          Route::get('/manager/newArrival', 'ManagerController@edit')->name('manager.newArrival');

          Route::get('/manager/balanceSheet', 'ManagerController@edit')->name('manager.report');

          Route::get('/manager/delete/{id}', 'ManagerController@delete');
          Route::post('/manager/delete/{id}', 'ManagerController@destroy');
    });
});
