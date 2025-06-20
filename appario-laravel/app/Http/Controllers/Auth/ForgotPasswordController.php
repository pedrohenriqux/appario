<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Exception;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('usuarios.solicitarSenha');
    }

    /* Envia o link de redefinição (como se enviasse um ingresso
        novo por e-mail)*/
    public function sendResetLinkEmail(Request $request)
    {
        try {
            // Valida se o campo de e-mail está correto
            $request->validate(['email' => 'required|email']);

            // Tenta enviar o link de redefinição usando o sistema automático do Laravel
            $status = Password::broker('usuarios')->sendResetLink(
                $request->only('email')     
            );

            // Redireciona com mensagem de sucesso (sem ternário)
            if ($status === Password::RESET_LINK_SENT) {
                return back()->with('status', __($status));
            } else {
                return back()->withErrors(['email' => __($status)]);
            }

            // Caso o e-mail não exista, volta com o erro

        } catch (\Throwable $th) {
            //  Em caso de erro inesperado, mostra mensagem de erro
            return back()->withErrors(['error' => 'Erro ao enviar o e-mail: ' . $th->getMessage()])->withInput();
        }
    }

}
