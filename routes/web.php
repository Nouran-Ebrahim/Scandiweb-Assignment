<?php
use phplite\Router\Route;

Route::get('/', 'ProductController@index');
Route::get('/add-product', 'ProductController@create');
Route::post('/store-product', "ProductController@store");
Route::post('/delete-product', "ProductController@delete");