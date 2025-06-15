<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\AuthController;


Route::get('/login', function () {
    return view('login.login'); // ou 'auth.login' dependendo do seu caminho
})->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/home', fn() => view('home'))->name('home');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.listar');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');


Route::resource('pessoas', PessoaController::class);
Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas.listar');
Route::post('/pessoas', [PessoaController::class, 'store'])->name('pessoas.inserir');
Route::put('/pessoas/{pessoa}', [PessoaController::class, 'update'])->name('pessoas.update');
Route::get('/pessoas/{pessoa}', [PessoaController::class, 'show'])->name('pessoas.show');
Route::delete('/pessoas/{pessoa}', [PessoaController::class, 'destroy'])->name('pessoas.destroy');
Route::get('/pessoas/create', [PessoaController::class, 'create'])->name('pessoas.create');
Route::get('/pessoas/{pessoa}/edit', [PessoaController::class, 'edit'])->name('pessoas.edit');
Route::get('/pessoas/{pessoa}/delete', [PessoaController::class, 'delete'])->name('pessoas.delete');
