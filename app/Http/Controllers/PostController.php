<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user', 'tags', 'image')->get();

        return view('general.post.index')->with([
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::get();
        return view('general.post.create')->with([
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate post title and content passed from user's input form
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);

        // Validate tags passed from user's input form
        $request->validate([
            'names' => ['required'],
        ]);

        // Store post to Post model
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        // Store respective tags to pivot table
        $post->tags()->sync($request->names);

        // Store post image to Image model
        // check if image passed from user's input
        if($request->file('image')) {
            // Get image extension
            $imageExtension = $request->file('image')->extension();
            // Set image name with extenxion
            $image = $post->slug . '.' . $imageExtension;

            // Store image to Image model
            Image::create([
                'name' => $image,
                'imageable_type' => Post::class,
                'imageable_id' => $post->id,
            ]);

            // Store image to disk
            $request->file('image')->storeAs('posts', $image, ['public']);
        }

        return redirect(route('admin.dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $tags = Tag::get();
        return view('general.post.show')->with([
            'post' => $post,
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function adminIndex() {
        $posts = Post::with('tags')->get();

        return view('admin.post.index')->with([
            'posts' => $posts,
        ]);
    }
}
