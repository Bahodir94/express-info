<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TenderPublished extends Notification
{
    use Queueable;

    /**
     * @var \App\Models\Tender
     */
    private $tender;

    /**
     * @var boolean
     */
    private $published;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Tender $tender
     * @param bool $published
     */
    public function __construct(\App\Models\Tender $tender, bool $published)
    {
        $this->tender = $tender;
        $this->published = $published;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'published' => $this->published,
            'tender' => $this->tender
        ];
    }
}
