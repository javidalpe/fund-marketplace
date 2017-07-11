<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Offer;

class OfferHasBeenCompleted extends Notification
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
        $vehicle = $offer->vehicle;

        $mailMessage = (new MailMessage)
                    ->subject('Oferta en trámite')
                    ->greeting("La oferta de acciones de $vehicle->company está siendo tramitada")
                    ->line("Tu oferta de venta de $offer->amount ha recibido las siguientes ofertas de compra:");

        foreach ($offer->bids as $key => $bid) {
            $mailMessage = $mailMessage->line("$bid->amount acciones por " . $bid->amount*$bid->stock_price . "€ (" . $bid->stock_price . "€ por acción)");
        }

        $mailMessage = $mailMessage->line("El equipo gestor procederá ahora a tramitar las órdenes de compra/venta, para lo que se pondrán en contacto contigo.");

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
