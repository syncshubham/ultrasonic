<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('/loginview', 'App\Http\Controllers\LoginController@showpage');
Route::get('/loginview', [LoginController::class, 'showpage'])->name('loginview');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});