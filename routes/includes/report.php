<?php

Route::any('/report', [
    'uses' => 'ReportController@index',
    'as' => 'report'
]);


