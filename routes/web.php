<?php

<<<<<<< HEAD
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Inertia\Inertia;
=======
use Illuminate\Support\Facades\Route;
>>>>>>> d80e6a5d039d304a3878a5f930fe81522960e5c5

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

<<<<<<< HEAD
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::get('/', [MainController::class, 'index']
//  function () {
    // return Inertia::render('main', [
        
    // ]);
);
// 'canLogin' => Route::has('login'),
// 'canRegister' => Route::has('register'),
// 'laravelVersion' => Application::VERSION,
// 'phpVersion' => PHP_VERSION,


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');
=======
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
>>>>>>> d80e6a5d039d304a3878a5f930fe81522960e5c5
