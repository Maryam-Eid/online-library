<?php

namespace App\Notifications\auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPassword extends Notification
{
    use Queueable;

    public $token;
    public $guard;


    /**
     * Create a new notification instance.
     */
    public function __construct($token, $guard = 'web')
    {
        $this->token = $token;
        $this->guard = $guard;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $routeName = $this->guard === 'admin' ? 'admin.password.reset' : 'student.password.reset';

        $resetLink = url(route($routeName, [
            'token' => $this->token,
            'email' => $notifiable->email
        ], false));

        return (new MailMessage)
            ->subject('Reset Your Password')
            ->greeting('Hello ' . $notifiable->name)
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', $resetLink)
            ->line('This password reset link will expire in ' . config('auth.passwords.students.expire') . ' minutes.')
            ->line('If you did not request a password reset, no further action is required.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
