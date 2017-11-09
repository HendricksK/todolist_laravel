<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ToDoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('todo/{id}', 'ToDoController@getAllToDoListObjectsForUserXHR');
// Route::get('todo/{id},{id1}', 'ToDoController@getAllToDoListObjectsForUserXHR');
Route::post('set-to-do-status/{id},{status}', 'ToDoController@setToDoObjectStatus');