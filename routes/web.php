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

Route::get('/notification', function () {
    return view('notifications/welcome');
});

foreach (File::allFiles(__DIR__ . '/includes') as $route_file) {
  require $route_file->getPathname();
}




Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});

Route::get('/email', [
    'uses' => 'OrderController@ship',
    'as' => 'email'
]);
