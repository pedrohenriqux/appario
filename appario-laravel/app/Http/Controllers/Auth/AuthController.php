<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect()->back()->with([
                'erro'  => 'Email ou senha inválida.'
            ])->onlyInput('email');
        }
        
    }
}
