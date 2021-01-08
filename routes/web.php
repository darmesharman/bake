<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VerifyPhoneController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified', 'phone.verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('leads', LeadController::class)->middleware(['auth', 'phone.verified']);
Route::resource('companies', CompanyController::class)->middleware(['auth', 'phone.verified']);
Route::resource('contacts', ContactController::class)->middleware(['auth', 'phone.verified']);

Route::get('/register', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/register', [RegistrationController::class, 'store'])->name('registration.store');

Route::get('/verify/phone/{user}', [VerifyPhoneController::class, 'getVerify'])->name('verifyPhone.getVerify');
Route::post('/verify/phone', [VerifyPhoneController::class, 'postVerify'])->name('verifyPhone.postVerify');
Route::post('/verification.send', fn () => 'hello')->name('verification.send');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgotPassword.index');
Route::post('/forgot-password', [ForgotPasswordController::class, 'getVerify'])->name('forgotPassword.getVerify');
