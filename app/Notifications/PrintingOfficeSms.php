<?php

namespace App\Notifications;

use App\Notifications\channels\GhasedakChanel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PrintingOfficeSms extends Notification
{
    use Queueable;

    public $orderid;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orderid)
    {
        $this->code = $orderid['code'];
        $this->type = $orderid['type'];
        $this->text = $orderid['text'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GhasedakChanel::class];
    }




}
