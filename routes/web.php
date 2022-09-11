<?php

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/users', UserController::class);

Route::get('/', fn() => Inertia::render('01'))
	->name('01');

Route::get('/02', fn() => Inertia::render('02'))
	->name('02');

Route::get('/03', fn() => Inertia::render('03'))
	->name('03');

Route::get('/04', fn() => Inertia::render('04'))
	->name('04');

Route::get('/05', fn() => Inertia::render('05'))
	->name('05');
//
//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//require __DIR__.'/auth.php';
