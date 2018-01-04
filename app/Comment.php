<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        // user_id foreign keyt keresne...
        return $this->belongsTo(User::class,  'user_id');
    }

}
