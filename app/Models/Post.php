<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model  implements HasMedia
{

    use HasFactory;
    use InteractsWithMedia;


    // Define the fillable attributes for the model
    protected $fillable = [
        'title',
        'content',
        'grade_id',
        'classroom_id',
    ];


    /*************************************** Relationships **************************************/

    // Define a belongsTo relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Define a one-to-many relationship with the PostComment model
    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }


    // Define a relationship between the post and its upvotes
    public function upvotes()
    {
        return $this->hasMany(PostUpvotes::class);
    }

    // Define a relationship between the post and its downvotes
    public function downvotes()
    {
        return $this->hasMany(PostDownvotes::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class)->withDefault();
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class)->withDefault();
    }

    /*************************************** Relationships **************************************/








    /*************************************** Methods **************************************/


    // Define an upvote function to add an upvote for a post
    public function upvote()
    {
        // If the user has already downvoted the post, remove the downvote and decrement the downvote count
        if ($this->downvotes()->where('user_id', auth()->user()->id)->exists()) {
            $this->removeDownvote( auth()->user());
            $this->decrement('count_downvotes');
        }

        // If the user can upvote the post, add an upvote and increment the upvote count
        if ($this->canUpvote(auth()->user())) {
            $this->upvotes()->create([
                'user_id' => auth()->id(),
            ]);
            $this->increment('count_upvotes');
        }
        // Otherwise, remove the upvote and decrement the upvote count
        else
        {
            $this->removeUpvote(auth()->user());
            $this->decrement('count_upvotes');
        }
    }




    // Define a downvote function to add a downvote for a post
    public function downvote()
    {
        // If the user has already upvoted the post, remove the upvote and decrement the upvote count
        if ($this->upvotes()->where('user_id',  auth()->user()->id)->exists()) {
            $this->removeUpvote( auth()->user()); // Call removeUpvote function to remove the upvote
            $this->decrement('count_upvotes'); // Decrement the upvote count
        }

        // Check if the user can downvote the post
        if ($this->canDownvote(auth()->user())) {
            $this->downvotes()->create([
                'user_id' => auth()->id(), // Add a new downvote for the user
            ]);

            $this->increment('count_downvotes');// Increment the downvote count

        }
        else
        {
            // If the user can't downvote, remove the downvote and decrement the downvote count
            $this->removeDownvote(auth()->user()); // Call removeDownvote function to remove the downvote
            $this->decrement('count_downvotes'); // Decrement the downvote count
        }
    }




    // Check if a user can upvote a post
    public function canUpvote(User $user)
    {
        return !$this->upvotes()->where('user_id', $user->id)->exists();
    }



    // Check if a user can downvote a post
    public function canDownvote(User $user)
    {
        return !$this->downvotes()->where('user_id', $user->id)->exists();
    }



    // Remove an upvote for a user
    public function removeUpvote(User $user)
    {
        $this->upvotes()->where('user_id', $user->id)->delete();
    }



    // Remove a downvote for a user
    public function removeDownvote(User $user)
    {
        $this->downvotes()->where('user_id', $user->id)->delete();
    }



}
