<?php 

Route::get('file-import-export', 'ReportController@fileImportExport');
Route::post('file-import', 'ReportController@fileImport')->name('file-import');
Route::get('file-export', 'ReportController@fileExport')->name('file-export');


