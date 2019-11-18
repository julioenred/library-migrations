<?php

use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;

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

Route::apiResource('users', 'UsersController');

Route::post('users/lend', 'UsersController@lend');
Route::post('login', 'UsersController@login');

Route::group(['middleware' => ['auth']], function ()
{
    Route::apiResource('books', 'BooksController');
});
