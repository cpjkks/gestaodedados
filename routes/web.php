<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\CursoController;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::resource('cursos', CursoController::class)
    ->middleware(['auth', 'verified']);

Route::get('/teste', function () {
    return 'O roteamento está vivo!';
});    

require __DIR__.'/settings.php';
