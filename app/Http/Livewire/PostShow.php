<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\PostComment;
use App\Notifications\ReceivedComment;
use Livewire\Component;

class PostShow extends Component
{


    public $upvote;
    public $downvote;
    public $comment;
    public $showMore = false;
    public $commentsPerPage = 5;
    public $commentsShown = 2;
    public $post_id;





    public function render()
    {
        $post = Post::findorfail($this->post_id);
        return view('livewire.post-show',compact('post'));
    }


    public function copyToClipboard()
    {
        // Copy the link to the clipboard
        $originalUrl = url()->current();
        $this->emit('linkCopied', $originalUrl);


    }






    public function upvote($id)
    {
        $post = Post::where('id',$id)->first();
        $post->upvote();
    }

    public function downvote($id)
    {
        $post = Post::where('id',$id)->first();
        $post->downvote();
    }

    public function addComment($id)
    {
        if(!empty($this->comment))
        {
        $comment = $this->comment;
        $user = auth()->user();
        PostComment::create(
            [
                'user_id'=> $user->id,
                'post_id'=>$id,
                'comment'=> $comment,
            ]
            );

            $post = Post::find($id);

            if($user->id !== $post->user_id)
            {
                // Create and send the notification to the user who posted the post
                $post->user->notify(new ReceivedComment($post, $user, $comment));
            }
        }

        $this->comment = '';
    }


    public function deleteComment($comment_id)
    {
        $comment = PostComment::findorfail($comment_id);
        if( (auth()->user()->id == $comment->user->id) || (auth()->user()->id == $comment->post->user->id) || (auth()->user()->isAdmin()) )
        {
            $comment->delete();
        }

    }

    public function toggleShowMore()
    {
        $this->showMore = !$this->showMore;
    }

    public function showMoreComments()
    {
        $this->commentsShown += $this->commentsPerPage;
    }



}
