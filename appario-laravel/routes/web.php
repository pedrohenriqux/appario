<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ApiarioController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

<<<<<<< HEAD
Route::get('/', function () {
    return view('homepage.homepage');
});

Route::get('/login', function () {
    return view('usuarios.login');
})->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
=======
// ROTAS DE LOGIN E USUÁRIOS (fora de auth)
Route::group([], function () {
    Route::get('/login', fn() => view('usuarios.login'))->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
>>>>>>> ccaf4dc9633d34f28606c06ac77a8462b3c16b71

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
    Route::get('/pessoas/{pessoa}/delete', [PessoaController::class, 'delete'])->name('pessoas.delete');

     Route::get('/apiarios/adicionar', [ApiarioController::class, 'create'])->name('apiarios.adicionar');
    Route::resource('apiarios', ApiarioController::class);

    Route::resource('colmeias', ColmeiaController::class);

    Route::get('/inspecao', fn() => 'Página de inspeção em construção.')->name('inspecao.index');
    Route::get('/apicultor', fn() => 'Página de apicultores em construção.')->name('apicultor.index');
   
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
