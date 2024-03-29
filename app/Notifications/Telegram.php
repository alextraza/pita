<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;
use Cart;
use App\Models\{Order, OrderItem, Address};
class Telegram extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["telegram"];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toTelegram($notifiable)
    {
        // $id = \App\Models\Order::first()[`id`] ;
        $url = url('/admin/');


        

        return TelegramMessage::create()
            // Optional recipient user id.
            // ->to($notifiable->telegram_user_id)
            ->to(env('TELEGRAM_GROUP'))
            // Markdown supported.
            // ->content("*Новый заказ*!\nYour invoice has been *PAID*")
            

            // (Optional) Blade template for the content.
            ->view('telegramBot', ['url' => $url])

            // (Optional) Inline Buttons
            // ->button('View Invoice', $url)
            ->button('Перейти к заказу', $url)
            // (Optional) Inline Button with callback. You can handle callback in your bot instance
            // ->buttonWithCallback('Confirm', 'confirm_invoice ' . $this->invoice->id)
            ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
