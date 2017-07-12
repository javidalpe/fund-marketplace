<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Offer;

class HandleOfferCompleted extends Notification
{
    use Queueable;

    private $offer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
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
        $offer = $this->offer;
        $investor = $offer->user;
        $vehicle = $offer->vehicle;

        $mailMessage = (new MailMessage)
                    ->subject('Oferta para tramitar')
                    ->greeting("La oferta de acciones de $vehicle->company debe ser tramitada")
                    ->line("La oferta de venta de $investor->name de $offer->amount acciones de $vehicle->company ha recibido las siguientes ofertas de compra:");

        foreach ($offer->bids as $key => $bid) {
            $investor = $bid->user;
            $mailMessage = $mailMessage->line("$investor->name: $bid->amount acciones por " . $bid->amount*$bid->stock_price . "€ (" . $bid->stock_price . "€ por acción)");
        }

        return $mailMessage;
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
