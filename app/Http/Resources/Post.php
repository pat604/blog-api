<?php

namespace App\Http\Resources;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class Post extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            // az author miatt kell a with():  return PostResource::collection(Post::with(['author'])
            'author' => $this->author,
            'title' => $this->title,
            'body' => $this->body,
            'comments' => Comment::collection($this->comments),
            'created_at' => Carbon::parse($this->created_at),
            'updated_at' => Carbon::parse($this->updated_at)

        ];
    }
}
