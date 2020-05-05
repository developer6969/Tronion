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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // ALTERNATIVILY USE CUSTOM KEY
    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    function time_elapsed_string($datetime, $full = false) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}