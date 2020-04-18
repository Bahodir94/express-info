<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RequestAction extends Notification
{
    use Queueable;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \App\Models\TenderRequest
     */
    private $request;

    /**
     * @var \App\Models\Tender|null
     */
    private $tender;

    /**
     * Create a new notification instance.
     *
     * @param string $type
     * @param \App\Models\TenderRequest $request
     * @param \App\Models\Tender|null $tender
     */
    public function __construct(string $type, \App\Models\TenderRequest $request, \App\Models\Tender $tender = null)
    {
        $this->type = $type;
        $this->request = $request;
        $this->tender = $tender;
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
        if ($this->type === 'rejected') {
            return [
                'type' => $this->type,
                'tenderName' => $this->tender->title,
                'customerName' => $this->tender->owner->getCommonTitle(),
                'tenderId' => $this->request->tender_id,
                'tenderSlug' => $this->tender->slug
            ];
        } else if ($this->type === 'accepted') {
            return [
                'type' => $this->type,
                'tenderName' => $this->request->tender->title,
                'customerName' => $this->request->tender->owner->getCommonTitle(),
                'tenderId' => $this->request->tender_id,
                'tenderSlug' => $this->request->tender->slug
            ];
        } else {
            return [
                //
            ];
        }
    }
}
