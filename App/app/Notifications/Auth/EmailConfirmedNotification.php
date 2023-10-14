<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class EmailConfirmedNotification extends Notification
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
            'message' => 'Адрес электронной почты успешно был подтвержден.',
        ];
    }
}
