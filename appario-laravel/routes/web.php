<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ApiarioController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/login', function () {
    return view('usuarios.login');
})->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Tela para inserir o e-mail e solicitar o link
Route::get('/esqueci-senha', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('usuarios.solicitarSenha');

// Processa o envio do link por e-mail
Route::post('/esqueci-senha', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('usuarios.email');

// Tela para redefinir a senha com token
Route::get('/redefinir-senha/{token}', [ResetPasswordController::class, 'showResetForm'])->name('usuarios.resetar');

// Processa a redefinição de senha
Route::post('/redefinir-senha', [ResetPasswordController::class, 'reset'])->name('usuarios.atualizar');


Route::get('/home', fn() => view('home'))->name('home');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.listar');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('pessoas', PessoaController::class);
    Route::get('/pessoas/{pessoa}/delete', [PessoaController::class, 'delete'])->name('pessoas.delete');

    Route::resource('apiarios', ApiarioController::class);

    Route::get('/colmeia', function () {
        return 'Página de colmeias em construção.';
    })->name('colmeia.index');

    Route::get('/inspecao', function () {
        return 'Página de inspeção em construção.';
    })->name('inspecao.index');

    Route::get('/apicultor', function () {
        return 'Página de apicultores em construção.';
    })->name('apicultor.index');

});


/*Route::resource('pessoas', PessoaController::class);
Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas.listar');
Route::post('/pessoas', [PessoaController::class, 'store'])->name('pessoas.inserir');
Route::put('/pessoas/{pessoa}', [PessoaController::class, 'update'])->name('pessoas.update');
Route::get('/pessoas/{pessoa}', [PessoaController::class, 'show'])->name('pessoas.show');
Route::delete('/pessoas/{pessoa}', [PessoaController::class, 'destroy'])->name('pessoas.destroy');
Route::get('/pessoas/create', [PessoaController::class, 'create'])->name('pessoas.create');
Route::get('/pessoas/{pessoa}/edit', [PessoaController::class, 'edit'])->name('pessoas.edit');
Route::get('/pessoas/{pessoa}/delete', [PessoaController::class, 'delete'])->name('pessoas.delete');*/
