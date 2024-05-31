<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Post;

class DailyDigest extends Notification
{
    use Queueable;

    protected $posts;

    // Accept posts in the constructor
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $mailMessage = (new MailMessage)
            ->subject('Daily Digest')
            ->greeting('Hello!')
            ->line('Here are the top posts for today:');

        foreach ($this->posts as $post) {
            $mailMessage->line($post->title . ' - ' . $post->created_at->toFormattedDateString());
        }

        $mailMessage->line('Thank you for using our application!');

        return $mailMessage;
    }
}
