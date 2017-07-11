<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Offer;

class OfferNotSuccess extends Notification
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

        return (new MailMessage)
                    ->subject('Oferta expirada')
                    ->greeting("La oferta de acciones de $vehicle->company ha expirado")
                    ->line("Sentimos comunicarte que tras 14 días de publicación en el
                    marketplace, tu oferta de venta de $offer->amount acciones ha sido
                    retirada ya que no no ha recibido ninguna puja.");
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
