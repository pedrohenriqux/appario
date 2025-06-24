<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ApiarioController;
use App\Http\Controllers\ColmeiaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return view('homepage.homepage');
});

// ROTAS DE LOGIN E USUÁRIOS (fora de auth)
Route::group([], function () {
    Route::get('/login', fn() => view('usuarios.login'))->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    // Redefinição de senha
    Route::get('/esqueci-senha', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('usuarios.solicitarSenha');
    Route::post('/esqueci-senha', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('usuarios.email');
    Route::get('/redefinir-senha/{token}', [ResetPasswordController::class, 'showResetForm'])->name('usuarios.resetar');
    Route::post('/redefinir-senha', [ResetPasswordController::class, 'reset'])->name('usuarios.atualizar');

    // Usuários (listar, criar, mostrar)
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.listar');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::resource('pessoas', PessoaController::class);
    Route::get('/pessoas/delete', [PessoaController::class, 'delete'])->name('pessoas.delete');

    Route::get('/apiarios/adicionar', [ApiarioController::class, 'create'])->name('apiarios.adicionar');
    Route::resource('apiarios', ApiarioController::class);
    Route::get('/relatorio-apiarios', [ApiarioController::class, 'gerarRelatorioPDF'])->name('apiarios.relatorio');


    Route::resource('colmeias', ColmeiaController::class);

    Route::get('/apiarios/{apiario}', [ApiarioController::class, 'show'])->name('apiarios.mostrar');
   
    Route::view('/inspecao', 'em-construcao.emConstrucao')->name('inspecao.construcao');
    Route::view('/apicultor', 'em-construcao.emConstrucao')->name('apicultor.construcao');


    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});