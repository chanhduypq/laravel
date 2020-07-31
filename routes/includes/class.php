<?php

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
Route::delete('/class/destroy/{primaryKeyValue}', [
    'uses' => 'ClassController@destroy',
    'as' => 'class.destroy'
]);

