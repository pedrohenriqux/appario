<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UsuarioResetPasswordNotification extends Notification
{
    protected $token;

    /**
     * Cria uma nova instância da notificação com o token.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Canais de entrega da notificação.
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Define o conteúdo do e-mail que será enviado.
     */
    public function toMail($notifiable)
    {
        // Monta a URL com o token e o e-mail
        $url = url(route('usuarios.resetar', [
            'token' => $this->token,
            'email' => $notifiable->email
        ], false));

        return (new MailMessage)
            ->subject('Redefinição de Senha - AppArio')
            ->line('Você está recebendo este e-mail porque solicitou a redefinição de senha para sua conta.')
            ->action('Redefinir Senha', $url)
            ->line('Se você não solicitou isso, nenhuma ação é necessária.');
    }
}
