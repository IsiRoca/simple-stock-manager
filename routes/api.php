<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;


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

Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::middleware(['auth:api', 'verified'])->group(function () {

        // Comments
        Route::apiResource('comments', 'CommentController')->only(['index', 'show', 'update', 'store', 'destroy']);
        Route::apiResource('products.comments', 'ProductCommentController')->only('store');
        Route::apiResource('products.comments', 'ProductCommentController')->only(['index', 'store']);

        // Products
        Route::apiResource('products', 'ProductController')->only(['index', 'show', 'update', 'store', 'destroy']);
        Route::post('/products/{product}/likes', 'ProductLikeController@store')->name('products.likes.store');
        Route::delete('/products/{product}/likes', 'ProductLikeController@destroy')->name('products.likes.destroy');

        // Countries
        Route::apiResource('countries', 'LocationCountryController')->only(['index', 'show', 'update', 'store', 'destroy']);
        Route::apiResource('countries.cities', 'CountryCityController')->only(['index', 'store']);

        // Cities
        Route::apiResource('cities', 'LocationCityController')->only(['index', 'show', 'update', 'store', 'destroy']);
        Route::apiResource('cities.companies', 'CityCompanyController')->only(['index', 'store']);
        Route::apiResource('cities.products', 'CityProductController')->only(['index', 'store']);

        // Companies
        Route::apiResource('companies', 'CompanyController')->only(['index', 'show', 'update', 'store', 'destroy']);
        Route::apiResource('companies.products', 'CompanyProductController')->only('index');

        // Types
        Route::apiResource('types', 'ProductTypeController')->only(['index', 'show', 'update', 'store', 'destroy']);
        Route::apiResource('types.products', 'ProductTypeProductController')->only('index');

        // Users
        Route::apiResource('users', 'UserController')->only('index', 'show', 'update', 'store');
        Route::apiResource('users.companies', 'UserCompanyController')->only('index');
        Route::apiResource('users.products', 'UserProductController')->only('index');
        Route::apiResource('users.comments', 'UserCommentController')->only('index');

        // Media
        Route::apiResource('media', 'MediaController')->only(['index', 'store', 'destroy']);

    });

    Route::post('/authenticate', 'Auth\AuthenticateController@authenticate')->name('authenticate');
});

