<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::get('authors-all','AuthorsController@index');
});
Route::middleware('api')->group(function () {
    Route::resource('books', 'BooksController');
});
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::resource('books', 'BooksController');
});
Route::middleware('auth.jwt:api')->group(function () {
    Route::resource('books', 'BooksController');
});
