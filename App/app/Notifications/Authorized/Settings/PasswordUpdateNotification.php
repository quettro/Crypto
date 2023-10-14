<?php

namespace App\Notifications\Authorized\Settings;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PasswordUpdateNotification extends Notification
{
    /**
     *
     */
    use Queueable;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @param $notifiable
     * @return string[]
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            'title' => 'Безопасность',
            'message' => 'Пароль от аккаунта успешно был изменен.',
        ];
    }
}
