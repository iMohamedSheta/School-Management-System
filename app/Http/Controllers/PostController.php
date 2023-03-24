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
               return Redirect::route('posts.index')->with('success', 'Post deleted successfully.');
            }

           return Redirect::route('posts.index')->with('error', 'You are not authorized to delete this post.');

    }
}
