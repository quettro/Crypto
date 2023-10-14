<?php

namespace App\Notifications\Authorized;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BalanceToppedUpNotification extends Notification
{
    /**
     *
     */
    use Queueable;

    /**
     * @param float $amount
     */
    public function __construct(public float $amount)
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
            'title' => 'Финансы',
            'message' => 'Ваш баланс пополнен на '. str($this->amount)->toTether() .' USDT. Продолжайте в том же духе!',
        ];
    }
}
