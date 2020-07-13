<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::get('authors-all','AuthorsController@index');
    Route::get('books','BooksController@index');
    Route::get('books-by-author','BooksController@showByAuthor');
});
Route::middleware('auth.jwt:api')->group(function () {
    Route::post('books-by-me','BooksController@showByUser');
    Route::post('books', 'BooksController@store');
    Route::match(['put','patch'],'books/{book}' ,'BooksController@update');
    Route::delete('books/{book}', 'BooksController@destroy');
});
