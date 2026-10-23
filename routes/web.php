<?php

use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\EstudioController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id}', [UtilizadorController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UtilizadorController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}/update', [UtilizadorController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UtilizadorController::class, 'delete'])->name('users.delete');

Route::get('/', [EstudioController::class, 'homepage'])->name('homepage');
Route::get('/studios', [EstudioController::class, 'index'])->name('studios.index');

Route::get('/studios/create', [EstudioController::class, 'create'])->name('studios.create');
Route::post('/studios/store', [EstudioController::class, 'store'])->name('studios.store');
Route::get('/studios/{id}/edit', [EstudioController::class, 'edit'])->name('studios.edit');
Route::post('/studios/{id}/update', [EstudioController::class, 'update'])->name('studios.update');
Route::delete('/studios/{id}', [EstudioController::class, 'delete'])->name('studios.delete');

Route::get('/studios/{id}/games', [JogoController::class, 'homepage'])->name('games.index');

Route::get('/games/create', [JogoController::class, 'create'])->name('games.create');
Route::post('/games/store', [JogoController::class, 'store'])->name('games.store');
Route::get('/games/{id}/edit', [JogoController::class, 'edit'])->name('games.edit');
Route::post('/games/{id}/update', [JogoController::class, 'update'])->name('games.update');
Route::delete('/games/{id}', [JogoController::class, 'delete'])->name('games.delete');

Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::fallback(function () {
    return view('404');
});
