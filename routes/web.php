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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('user/{id}', function($id) {
	return view('users.data', [ 'id' => $id]);
});

Route::get('/there', function () {
    return 'I dont know much...';
});

/*
redirects go here, have fun
*/

Route::redirect('/here', '/there', 301);

/*
routes prefix here
*/
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return 'This is a prefix, with a group';
    });
});
