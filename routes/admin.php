<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard', 'ShowDashboard')->name('dashboard');
Route::resource('products', 'ProductController');
Route::resource('companies', 'CompanyController');
Route::resource('countries', 'LocationCountryController');
Route::resource('cities', 'LocationCityController');
Route::delete('/products/{product}/thumbnail', 'ProductThumbnailController@destroy')->name('products_thumbnail.destroy');
Route::resource('users', 'UserController')->only(['index', 'edit', 'update']);
Route::resource('comments', 'CommentController')->only(['index', 'edit', 'update', 'destroy']);
Route::resource('media', 'MediaLibraryController')->only(['index', 'show', 'create', 'store', 'destroy']);
