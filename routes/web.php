<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ManufacturaController;
use App\Http\Controllers\NombreController;
use App\Http\Controllers\MaquineroController;
use App\Http\Controllers\PagoController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('alumnos', AlumnoController::class)
    ->middleware(['auth:sanctum', 'verified']);
Route::resource('manufacturas', ManufacturaController::class)
    ->middleware(['auth:sanctum', 'verified']);
Route::resource('nombres', NombreController::class)
    ->middleware(['auth:sanctum', 'verified']);
Route::resource('maquileros', MaquineroController::class)
    ->middleware(['auth:sanctum', 'verified']);
Route::resource('pagos', PagoController::class)
    ->middleware(['auth:sanctum', 'verified']);
