<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AnoDeEscolaridadeController;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::resource('cursos', CursoController::class)
    ->middleware(['auth', 'verified']);

Route::resource('anos_de_escolaridade', AnoDeEscolaridadeController::class)
    ->middleware(['auth', 'verified']);    

Route::resource('turnos', TurnoController::class)
    ->middleware(['auth', 'verified']);      

Route::resource('tipos_de_turno', TipoDeTurnoController::class)
    ->middleware(['auth', 'verified']);    

Route::get('/teste', function () {
    return 'O roteamento está vivo!';
});    

require __DIR__.'/settings.php';
