<?php

Route::get('/student', [
    'uses' => 'StudentController@index',
    'as' => 'student'
]);
Route::get('/student/create', [
    'uses' => 'StudentController@create',
    'as' => 'student.create'
]);//;
Route::post('/student/store', [
    'uses' => 'StudentController@store',
    'as' => 'student.store'
]);
Route::get('/student/edit/{primaryKeyValue}', [
    'uses' => 'StudentController@edit',
    'as' => 'student.edit'
]);
Route::put('/student/update/{primaryKeyValue}', [
    'uses' => 'StudentController@update',
    'as' => 'student.update'
]);
Route::delete('/student/destroy/{primaryKeyValue}', [
    'uses' => 'StudentController@destroy',
    'as' => 'student.destroy'
]);
Route::get('/student/download/{primaryKeyValue}', [
    'uses' => 'StudentController@download',
    'as' => 'student.download'
]);

