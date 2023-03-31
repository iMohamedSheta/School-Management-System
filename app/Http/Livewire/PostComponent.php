<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\PostComment;
use App\Notifications\ReceivedComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;

    public $title;
    public $content;
    public $upvote;
    public $downvote;
    public $comment;
    public $showMore = false;

    public $search = '';



public $commentsPerPage = 5;
public $commentsShown = 2;



    public function render()
    {

        $posts = Post::where('title', 'like', '%'.$this->search.'%')
        ->orWhere('content', 'like', '%'.$this->search.'%')
        ->orderByDesc(DB::raw('count_upvotes - count_downvotes'))
        ->paginate(5);

        $posts->each(function ($post) {
            $post->comments = $post->comments->sortByDesc('created_at');
        });

        return view('livewire.post-component',compact('posts'));
    }


    public function uploadImage(Request $request)
    {
        $uploadedFile = $request->file('upload');

        $filename = time() . '_' . $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->storeAs('public/uploads', $filename);

        $media = auth()->user()->addMedia(storage_path('app/'.$path))->toMediaCollection('Postsimages');

        session()->put('uploadedImage', $media);

        return response()->json(['url' => $media->getUrl()]);
    }


    public function savePost(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        // Create the post and associate with authenticated user
        $post = auth()->user()->posts()->create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content']
        ]);

        // Retrieve the uploaded image from the Spatie Media Library and attach it to the post
        $media = auth()->user()->getMedia('Postsimages')->last();
        if ($media) {
            $media->move($post,'Postsimages');
            // $post->attachMedia($media, 'Posts-images');
        }

        return redirect()->back()->with('success','تم نشر المنشور بنجاح.');
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
