<?php

use Illuminate\Support\Facades\Route;

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
