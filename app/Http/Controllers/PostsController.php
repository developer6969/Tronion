<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Post;

// T1|C8 : Routing to COntroller
// $ php artisan make:controller PostsController
class PostsController 
{
    // Here $post variable is automatically available from get('/posts/{post}')
    public function show($slug)
    {
        // $posts = [
        //     'my-first-post' => 'Hello , this is my first blog post',
        //     'my-second-post' => 'Now i am getting the hang of this blogging thing.'
        // ];
        
        // T2|C9 : ALTERNATIVELY
        // In case of error stop server and restart php artisan ser
        $post = DB::table('posts')->where('slug', $slug)->first();
        // OR WE CAN USE ELOQUENT
        $post = Post::where('slug', $slug)->firstOrFail();
        //dd($post);

        return view('post', [
            'post' => $post
        ]);
    }
}