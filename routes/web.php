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
          //food
          Route::get('/manager/add', 'ManagerController@add')->name('manager.add');
          Route::post('/manager/add', 'ManagerController@insert');

          Route::get('/manager/allFood', 'ManagerController@allFood')->name('manager.allFood');

          Route::get('/manager/editFood/{id}', 'ManagerController@editFood')->name('manager.editFood');
          Route::post('/manager/editFood/{id}', 'ManagerController@updateFood');

          Route::get('/manager/deleteFood/{id}', 'ManagerController@deleteFood')->name('manager.deleteFood');
          Route::post('/manager/deleteFood/{id}', 'ManagerController@destroyFood');

          Route::get('/manager/suggestFood/{id}', 'ManagerController@suggestFood')->name('manager.suggestFood');
          Route::post('/manager/suggestFood/{id}', 'ManagerController@suggested');

          Route::get('/manager/statusFood/{id}', 'ManagerController@statusFood')->name('manager.statusFood');
          Route::post('/manager/statusFood/{id}', 'ManagerController@status');

          Route::get('/manager/ingredients/{id}', 'ManagerController@ingredientsFood')->name('manager.statusFood');
          Route::post('/manager/ingredients/{id}', 'ManagerController@ingredients');

          Route::get('/manager/allDeliveryMan', 'ManagerController@allDeliveryMan')->name('manager.allDeliveryMan');

          Route::get('/manager/newArrival', 'ManagerController@newArrival')->name('manager.newArrival');

          Route::get('/manager/reviews/{id}', 'ManagerController@reviews')->name('manager.reviews');

          Route::get('/manager/balanceSheet', 'ManagerController@report')->name('manager.report');

          Route::get('/manager/pdfview','ManagerController@pdfview')->name('manager.pdfview');

    });
});
