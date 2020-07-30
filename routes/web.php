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
    return view('welcome');
});


Route::get('/class', [
    'uses' => 'ClassController@index',
    'as' => 'class'
]);
Route::get('/class/create', [
    'uses' => 'ClassController@create',
    'as' => 'class.create'
]);//;
Route::post('/class/store', [
    'uses' => 'ClassController@store',
    'as' => 'class.store'
]);
Route::get('/class/edit/{primaryKeyValue}', [
    'uses' => 'ClassController@edit',
    'as' => 'class.edit'
]);
Route::put('/class/update/{primaryKeyValue}', [
    'uses' => 'ClassController@update',
    'as' => 'class.update'
]);
Route::delete('/class/delete/{primaryKeyValue}', [
    'uses' => 'ClassController@delete',
    'as' => 'class.delete'
]);
