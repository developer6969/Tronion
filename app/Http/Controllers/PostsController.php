<?php

namespace App\Http\Controllers;

// T1|C8 : Routing to COntroller
// $ php artisan make:controller PostsController
class PostsController 
{
    // Here $post variable is automatically available from get('/posts/{post}')
    public function show($post)
    {
        $posts = [
            'my-first-post' => 'Hello , this is my first blog post',
            'my-second-post' => 'Now i am getting the hang of this blogging thing.'
        ];
    
        if (!array_key_exists($post, $posts)) {
            abort(404, 'Sorry, that post was not found');
        }

        return view('post', [
            'postdata' => $posts[$post] ?? 'Nothing here yet.'
        ]);
    }
}