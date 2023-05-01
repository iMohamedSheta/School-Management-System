<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($id)
    {
        $post = Post::findorfail($id);
        return view('post-show',compact('post'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function savePost(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'grade_id'=>'nullable|exists:grades,id',
            'classroom_id'=>'nullable|exists:classrooms,id',
        ]);

        // Create the post and associate with authenticated user
        $post = auth()->user()->posts()->create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'grade_id' => $validatedData['grade_id'],
            'classroom_id' => $validatedData['classroom_id'],
        ]);

        // Retrieve the uploaded image from the Spatie Media Library and attach it to the post
        $media = auth()->user()->getMedia('Postsimages')->last();
        if ($media) {
            $media->move($post,'Postsimages');
            // $post->attachMedia($media, 'Posts-images');
        }

        return redirect()->back()->with('success','تم نشر المنشور بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
            $post_id = $request->post_id;
            $post = Post::findorfail($post_id);

            if((auth()->user()->id == $post->user->id) || (auth()->user()->isAdmin()))
            {
                $post->delete();
               return Redirect::route('posts.index')->with('success', 'alert.discussion-deleted');
            }

           return Redirect::route('posts.index')->with('error', 'alert.error');

    }
}
