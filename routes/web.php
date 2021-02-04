<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SendSmsController;
use App\Http\Controllers\VerifyPhoneController;

use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

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



// Route::mixddleware(['auth:sanctum'])->group( function($routes) {
// });
    // ->prefix('api')
    // ->namespace('Api')
    // ->as('api.')
    // ->group(function ($request) {
    // $value = session()->all();
    // dd($routes);
    // session()->put('_token', $value["_token"]);
    // dd($value, $value ["_token"] , session()->all() );
    // });
// ->group(function () {
    // you can write your routes here.
// }


Route::middleware(['auth:sanctum', 'verified', 'phone.verified'])->get('/vue/dashboard', function (Request $request) {
    // dd($request);
    return Redirect::to('http://localhost:8000/vue/dashboard/1');
    });
    

Route::post('/auth', [LoginController::class, 'login']);


Route::get('/dashboard', function () {
    return view('home');
})->where('any', '.*');



Route::get('/', [HomeController::class, 'index'])->name('home.index');  
// Route::get('/1', [HomeController::class, 'indexInertia'])->name('home.indexInertia');

// Route::middleware(['auth:sanctum', 'verified', 'phone.verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::resource('leads', LeadController::class)->middleware(['auth', 'phone.verified']);
Route::resource('companies', CompanyController::class);

Route::resource('contacts', ContactController::class)->middleware(['auth', 'phone.verified']);
Route::resource('blogs', BlogController::class);

Route::prefix('companies/{company}/')->middleware('auth')->group(function () {
    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');
    Route::post('/comments/{comment}/dislike', [CommentController::class, 'dislike'])->name('comments.dislike');
});

Route::get('/register', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/register', [RegistrationController::class, 'store'])->name('registration.store');



Route::get('/verify/phone/{user}/{token}', [VerifyPhoneController::class, 'getVerify'])->name('verifyPhone.getVerify');
Route::post('/verify/phone', [VerifyPhoneController::class, 'postVerify'])->name('verifyPhone.postVerify');

Route::post('/verification-resend', [VerifyPhoneController::class, 'resend'])->name('verifyPhone.resend');
Route::get('/verification-send/{user}', [SendSmsController::class, 'sendSmsToVerify'])->name('sendSms.sendSmsToVerify');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgotPassword.index');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('forgotPassword.store');

Route::get('/reset-password/{user}/{token}', [ResetPasswordController::class, 'index'])->name('resetPassword.index');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('resetPassword.store');


// Route::get('test', function ()
// {
    // return Inertia::render('Pages/home');
// });

Route::get('/instagram', [InstagramController::class, 'index']);
