<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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
Route::apiResource('contacts', ContactController::class);
Route::apiResource('companies', CompanyController::class);

// Route::get('/update_boards/{updated_at}', [MainController::class, 'update_boards'])->name('update_boards');

Route::get('/update_boards/newboard/{title}', [MainController::class, 'create_board'])->name('create_board');
Route::put('/update_boards/removeboard/{boardid}', [MainController::class, 'remove_board'])->name('remove_board');
Route::put('/update_boards/updateboard/{boardid}/newtitle/{title}', [MainController::class, 'update_boards_title']);

Route::get('/update_boards/createlead/{boardid}/newleaddescription/{description}', [MainController::class, 'create_lead']);
Route::put('/update_boards/updatelead/{leadid}/description/{description}', [MainController::class, 'update_lead']);
Route::put('/update_boards/removelead/{leadid}', [MainController::class, 'remove_lead'])->name('remove_lead');
// Route::get('/update_boards/{updated_at}', [MainController::class, 'update_boards'])->name('update_boards');

// create board
// create lead
// Route::post('/update_leads/{board_id}', [MainController::class, 'create_lead']);

// update boards order
// Route::put('/update_boards/{board_id}/{board_id2}/{lead_id}/{order}', [MainController::class, 'update_boards_order']);
// update leads order
// Route::put('/update_leads/{board_id}', [MainController::class, 'update_leads_order']);
