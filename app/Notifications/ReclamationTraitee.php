<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Reclamation;

class ReclamationTraitee extends Notification
{
    use Queueable;

    public function __construct(public Reclamation $reclamation) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('✅ Votre réclamation est traitée - ' . $this->reclamation->reference)
            ->greeting('Cher(e) ' . $notifiable->name)
            ->line('Votre réclamation **' . $this->reclamation->reference . '** a été traitée.')
            ->line('Veuillez vous présenter à nos bureaux pour récupérer votre dossier.')
            ->salutation('Cordialement, CMSS');
    }
}