<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReceivedComment extends Notification
{
    use Queueable;

    public $post;
    public $user;
    public $comment;

    /**
     * Create a new notification instance.
     */
    public function __construct($post,$user,$comment)
    {
        //
        $this->post = $post;
        $this->user = $user;
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
{
    $type= trans('main.received-comment-notify-type');
    return [
        'post_title' => $this->post->title,
        'comment_author_name' => $this->user->name,
        'comment_author_photo' => $this->user->profile_photo_path,
        'comment_author_id' => $this->user->id,
        'post_id'=>$this->post->id,
        'type'=>$type,
        'comment_content' => $this->comment,
        // 'post_url' => route('posts.show', $this->post),
    ];
}



    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
