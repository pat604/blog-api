<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePost;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Http\Resources\Post as PostResource;
use App\Post;

class PostController extends Controller
{

    public function index()
    {
        // return PostResource::collection(Post::all());
        return PostResource::collection(Post::with(['author'])->get());
    }

    // route model binding
    public function show(Post $post)
    {
        return new PostResource($post->load(['author', 'comments']));
    }

    public function store(StorePost $request)
    {

        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->slug = $post->createSlug();
        $post->author = $request->user();

        $post->save();
        // auth()->user()->posts()->save();

        // created
        return (new PostResource($post->load(['author'])))->response()->setStatusCode(201);
    }

    public function update(UpdatePost $request, Post $post)
    {
        $newPost = $post;
        $newPost->title = request('title');
        $newPost->createSlug();
        $newPost->body = request('body');

        $newPost->save();

        return response(200);
    }

    public function destroy(DeletePost $request, Post $post)
    {
        $post->delete();

        return response(200);
    }



}
