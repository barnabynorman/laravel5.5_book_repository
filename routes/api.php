<?php

use Illuminate\Http\Request;

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

/**
* Support the following routes:
*
* {hostname}/api/books - Lists all available books
* {hostname}/api/books/1 - List book with id = 1
* {hostname}/api/books/?author=Christopher%20Negus - List all available books
*   filtered by author=Christopher Negus
* {hostname}/api/books/?category=Linux - List of all available books
*   filtered by category=Linux
* {hostname}/api/books/?author=Robin%20Nixon&category=Linux - as above with both filters
* {hostname}/api/categories - Lists all available categories
*
* To add a new book, post to the url:
*   {hostname}/api/books/store
*/
Route::get('/books', 'BookController@index');
Route::get('/books/{id}', 'BookController@show');
Route::post('/books/store', 'BookController@store');

Route::get('/categories', 'CategoryController@index');
