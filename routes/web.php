<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurbineController;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/farms');
});

Route::get('/farms', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/farms/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
