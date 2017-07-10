<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Offer;

class OfferAvailable extends Notification
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
        $url = route('offers.show', $this->offer);

        $vehicle = $this->offer->vehicle;

        return (new MailMessage)
                    ->subject('Oferta publicada')
                    ->greeting($vehicle->company . ', ' . $this->offer->amount . ' acciones')
                    ->line('Se acaba de publicar una oferta de venta de ' . $this->offer->amount . ' acciones
                    de la empresa ' . $vehicle->company . ' por valor de ' . $this->offer->stock_price . '€
                    por acción (' . $this->offer->amount*$this->offer->stock_price . '€).')
                    ->action('Ir a la oferta', $url);
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
