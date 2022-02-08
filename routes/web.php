<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home') -> name('home');

Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

Route::get('/post/{id}', 'HomeController@post')-> name('post');

Route::middleware('auth')->prefix('posts')->group(function() {
Route::get('/post/{id}', 'HomeController@post')-> name('post');

Route::get('/create', 'PostController@create')-> name('create');
Route::post('/store', 'PostController@store')-> name('store');

Route::get('/delete/{id}', 'PostController@delete')-> name('delete');
});