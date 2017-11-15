<?php

namespace App\Http\Resources;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class Comment extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */

    // gives back JSON

    // we can access model properties directly from the $this variable. This is because a resource class will
    // automatically proxy property and method access down to the underlying model for convenient access.

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author' => new User($this->author),
            'body' => $this->body,
            'created_at' => Carbon::parse($this->created_at),
            'updated_at' => Carbon::parse($this->updated_at)
        ];
    }
}
