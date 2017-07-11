<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Bid;


class BidPublished extends Notification
{
    use Queueable;

    private $bid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Bid $bid)
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
        $url = route('bids.show', $bid);

        $offer = $bid->offer;
        $vehicle = $offer->vehicle;

        return (new MailMessage)
                    ->subject('Puja publicada')
                    ->greeting("$bid->amount acciones de $vehicle->company")
                    ->line('Se acaba de publicar una puja para comprar ' . $bid->amount . ' acciones
                    de la empresa ' . $vehicle->company . ' por valor de ' . $bid->stock_price . '€
                    por acción (' . $bid->amount*$bid->stock_price . '€).')
                    ->action('Ir a la puja', $url);
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
