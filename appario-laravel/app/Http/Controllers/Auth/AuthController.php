<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            if (Auth::attempt($credenciais)) {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard'));
            }
            return back()->withErrors(['email' => 'Credenciais inválidas.'])->withInput(); 
        } catch (\Throwable $e) {
            return back()->withErrors(['erro'  => 'Erro no login: ' . $e->getMessage()]);
            
        }        
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
