<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExamNotification extends Notification
{
    use Queueable;

    private $examDate;
    private $content;

    /**
     * Create a new notification instance.
     *
     * @param string $examDate
     * @param string $content
     * @return void
     */
    public function __construct($examDate, $content)
    {
        $this->examDate = $examDate;
        $this->content = $content;
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
            'exam_date' => $this->examDate,
            'content' => $this->content,
        ];
    }
}
