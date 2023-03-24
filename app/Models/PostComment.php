<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $fillable = ['comment','user_id',"post_id"];



        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function post()
        {
            return $this->belongsTo(Post::class);
        }


        // public function commentUpvotes()
        // {
        //     return $this->hasMany(CommentUpvote::class);
        // }

        // public function commentDownvotes()
        // {
        //     return $this->hasMany(CommentDownvote::class);
        // }

        // public function upvote(User $user)
        // {
        //     $this->commentUpvotes()->create([
        //         'user_id' => $user->id,
        //     ]);

        //     $this->increment('upvotes');
        // }

        // public function downvote(User $user)
        // {
        //     $this->commentDownvotes()->create([
        //         'user_id' => $user->id,
        //     ]);

        //     $this->increment('downvotes');
        // }

        // public function removeUpvote(User $user)
        // {
        //     $this->commentUpvotes()->where('user_id', $user->id)->delete();
        //     $this->decrement('upvotes');
        // }

        // public function removeDownvote(User $user)
        // {
        //     $this->commentDownvotes()->where('user_id', $user->id)->delete();
        //     $this->decrement('downvotes');
        // }

        // public function hasUpvoted(User $user)
        // {
        //     return $this->commentUpvotes()->where('user_id', $user->id)->exists();
        // }

        // public function hasDownvoted(User $user)
        // {
        //     return $this->commentDownvotes()->where('user_id', $user->id)->exists();
        // }

}
