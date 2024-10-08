<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('alunos',function() {
    $lista= \app\models\user::all();
    return view('minha-view',compact('lista'));
});   
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProfessorController;

Route::resource('alunos', AlunoController::class);
Route::resource('salas', SalaController::class);
Route::resource('enderecos', EnderecoController::class);
Route::resource('professores', ProfessorController::class);

use App\Http\Controllers\EstudanteController;

Route::resource('estudantes', EstudanteController::class);
