<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    protected $guarded = [];
    // OR
    // protected $fillable = ['title', 'slug', 'extract', 'image', 'body', 'published_at', 'created_at', 'updated_at'];


    public function path()
    {
        return route('posts.show', $this);
    }
}
