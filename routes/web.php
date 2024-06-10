<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenistaController;
use App\Http\Controllers\TorneoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'tenistas', 'middleware' => 'auth'], function () {
    $controller = TenistaController::class;

    Route::get('/', [$controller, 'index'])->name('tenistas.index');
    Route::get('/create', [TenistaController::class, 'create'])->name('tenistas.create');//->middleware('admin');
    Route::post('/', [$controller, 'store'])->name('tenistas.store');//->middleware('admin');
    Route::get('/{tenista}', [$controller, 'show'])->name('tenistas.show');
    Route::get('/{tenista}/edit', [$controller, 'edit'])->name('tenistas.edit');
    Route::put('/{tenista}', [$controller, 'update'])->name('tenistas.update');
    Route::delete('/{tenista}', [$controller, 'destroy'])->name('tenistas.destroy');
});

Route::group(['prefix' => 'torneos', 'middleware' => 'auth'], function () {
    $controller = TorneoController::class;

    Route::get('/', [$controller, 'index'])->name('torneos.index');
    Route::get('/create', [$controller, 'create'])->name('torneos.create');
    Route::post('/', [$controller, 'store'])->name('torneos.store');
    Route::get('/{torneo}', [$controller, 'show'])->name('torneos.show');
    Route::get('/{torneo}/edit', [$controller, 'edit'])->name('torneos.edit');
    Route::put('/{torneo}', [$controller, 'update'])->name('torneos.update');
    Route::delete('/{torneo}', [$controller, 'destroy'])->name('torneos.destroy');
});
