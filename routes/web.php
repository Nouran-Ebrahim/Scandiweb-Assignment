<?php
use phplite\Router\Route;


// Route::get('/home', function () {
//     return '<a href="http://localhost/Scandiweb%20Junior%20Developer%20test/public/admin/dashboard">click</a>';
// });
Route::get('/product-list', 'ProductController@index');
Route::get('/add-product', 'ProductController@create');
Route::post('/store-product', "ProductController@store");
Route::post('/delete-product', "ProductController@delete");