<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class YouHaveBeenSignedUp extends Notification
{
    use Queueable;

    private $user;
    private $manager;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, User $manager)
    {
        $this->user = $user;
        $this->manager = $manager;
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
        $url = route('confirm', $this->user->id);

        return (new MailMessage)
                    ->subject('Bienvenido a ' . config('app.name'))
                    ->greeting('Hola ' . $this->user->name . '!')
                    ->line('Bienvenido a ' . config('app.name') . '.')
                    ->line(config('app.name') . ' es un marketplace de compraventa de acciones. Te
                    enviamos este email porque ' . $this->manager->name . ' te ha dado de alta como
                     inversor. Para confirmar el registro, pulsa en el siguiente enlace.')
                    ->action('Confirmar alta de usuario', $url);
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
