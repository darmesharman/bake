<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('leads', LeadController::class);
<<<<<<< HEAD
Route::apiResource('contacts', ContactController::class);
=======
Route::apiResource('companies', CompanyController::class);
>>>>>>> c26b35f0f283a007d521949a4d09fd6444d59f32
