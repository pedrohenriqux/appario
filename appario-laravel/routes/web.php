<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;

Route::get('/', function () {
    return view('index'); // Página inicial
});

Route::get('/login', function () {
    return view('login'); // Tela de login
});

Route::get('/dashboard', function () {
    return view('dashboard'); // Painel principal
});

Route::get('/formulario', function () {
    return view('forms'); // Formulário genérico
});


Route::resource('pessoas', PessoaController::class);
Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas.listar');
Route::post('/pessoas', [PessoaController::class, 'store'])->name('pessoas.store');
Route::put('/pessoas/{pessoa}', [PessoaController::class, 'update'])->name('pessoas.update');
Route::get('/pessoas/{pessoa}', [PessoaController::class, 'show'])->name('pessoas.show');
Route::delete('/pessoas/{pessoa}', [PessoaController::class, 'destroy'])->name('pessoas.destroy');
Route::get('/pessoas/create', [PessoaController::class, 'create'])->name('pessoas.create');
Route::get('/pessoas/{pessoa}/edit', [PessoaController::class, 'edit'])->name('pessoas.edit');
Route::get('/pessoas/{pessoa}/delete', [PessoaController::class, 'delete'])->name('pessoas.delete');
