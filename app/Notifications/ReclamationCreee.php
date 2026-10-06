<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Reclamation;

class ReclamationCreee extends Notification
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
            ->subject('Nouvelle Réclamation - ' . $this->reclamation->reference)
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Votre réclamation a été enregistrée avec succès.')
            ->line('**Référence :** ' . $this->reclamation->reference)
            ->line('**Objet :** ' . $this->reclamation->objet)
            ->line('**Statut :** En attente de traitement')
            ->action('Voir ma réclamation', url('/reclamations'))
            ->line('Merci de nous faire confiance.')
            ->salutation('Cordialement, CMSS');
    }
}