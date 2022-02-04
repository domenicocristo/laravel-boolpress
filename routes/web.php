<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home') -> name('home');

Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

Route::get('/post/{id}', 'HomeController@post')-> name('post');

Route::get('/create', 'HomeController@create')-> name('create');
Route::post('/store', 'HomeController@store')-> name('store');

Route::get('/delete/{id}', 'HomeController@delete')-> name('delete');