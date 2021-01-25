<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Resources\CityCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\CompanyController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cities', [CityController::class, 'cities']);
Route::get('/districts', [CityController::class, 'districts']);
Route::get('/micro-districts', [CityController::class, 'microDistricts']);
Route::get('/categories/{category}', [CategoryController::class, 'subCategories']);
