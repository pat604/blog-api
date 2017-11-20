<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author()
    {
        // methodname_id foreign key-t keres
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function createSlug()
    {
        $slug = $this->title . "-" . $this->created_at->toDateTimeString();
        return $slug;
    }
}
