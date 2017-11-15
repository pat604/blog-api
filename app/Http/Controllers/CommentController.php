<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\DeleteComment;
use App\Http\Requests\StoreComment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\Comment as CommentResource;

class CommentController extends Controller
{
    // route model binding
    public function index(Post $post)
    {
        return CommentResource::collection($post->comments());
    }

    public function store(StoreComment $request, Post $post)
    {
        $comment = new Comment;
        $comment->body = request('body');
        $comment->author = $post->author;    // ?

        $post->comments()->save($comment);

        // created
        return response(201);
    }


    public function destroy(DeleteComment $request, Comment $comment)
    {
        $comment->delete();

        return response(200);
    }

}
