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
