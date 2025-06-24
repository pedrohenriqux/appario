<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class ResetPasswordController extends Controller
{
    // Exibe o formulário para definir a nova senha (usando o token como "bilhete de acesso")
    public function showResetForm(Request $request, $token)
    {
        return view('usuarios.redefinirSenha', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    // Atualiza a senha no sistema e deixa o usuário pronto para acessar
    public function reset(Request $request)
    {
        try {
            // Valida os dados do formulário
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed',
            ]);

            // 🎬 Tenta redefinir a senha usando o sistema do Laravel
            $status = Password::broker('usuarios')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($usuario, $password) {
                    // Atualiza a senha com segurança e define novo token de sessão
                    $usuario->password = Hash::make($password);
                    $usuario->setRememberToken(Str::random(60));
                    $usuario->save();
                }
            );

            if ($status === Password::PASSWORD_RESET) {
                return redirect()->route('login.form')->with('status', __($status));
            }

            // Caso algo dê errado, volta com erro
            return back()->withErrors(['email' => __($status)])->withInput();
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Erro ao redefinir senha: ' . $e->getMessage()])->withInput();
        }
    }
}       
