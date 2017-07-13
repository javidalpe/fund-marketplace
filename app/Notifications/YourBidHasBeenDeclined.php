<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class YourBidHasBeenDeclined extends Notification
{
    use Queueable;

    private $bid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Bid $bid)
    {
        $this->bid = $bid;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $bid = $this->bid;
        $offer = $bid->offer;
        $vehicle = $offer->vehicle;

        return (new MailMessage)
                    ->subject('Oferta de compra rechazada')
                    ->greeting("La oferta de compra de acciones de $vehicle->company ha sido rechazada")
                    ->line("Sentimos comunicarte que el vendedor de acciones de $vehicle->company ha rechazado
                    tu oferta de compra de $bid->amount acciones por " . $bid->stock_price . "€ por acción.");
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
