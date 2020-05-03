<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return view('posts.index', [
            'categories' => Category::all(),
            'posts' => Post::latest('published_at')->get()
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    // Display the specified resource.
    public function show($post)
    {
        return view('posts.show', [
            'post' => Post::where('slug', $post)->firstOrFail()
        ]);
    }

    // Show the form for editing the specified resource.
    public function edit(Post $post)
    {
        //
    }

    // Update the specified resource in storage.
    public function update(Request $request, Post $post)
    {
        //
    }

    // Remove the specified resource from storage.
    public function destroy(Post $post)
    {
        //
    }
}






/**
 
* <?php
* 
* namespace App\Http\Controllers;
* 
* use App\Category;
* use Illuminate\Support\Facades\DB;
* use App\Post;
* 
* // T1|C8 : Routing to COntroller
* // $ php artisan make:controller PostsController
* class PostsController 
* {
    * // Here $post variable is automatically available from get('/posts/{post}')
    * public function show($slug)
    * {
        * // Static Database for sample case
        * // $posts = [
        * //     'my-first-post' => 'Hello , this is my first blog post',
        * //     'my-second-post' => 'Now i am getting the hang of this blogging thing.'
        * // ];
        *         
        * // T2|C9 : ALTERNATIVELY
        * // In case of error stop server and restart php artisan ser
        * // $post = DB::table('posts')->where('slug', $slug)->first();
        * // OR WE CAN USE ELOQUENT
        * $post = Post::where('slug', $slug)->firstOrFail();
        * // OR
        * // $post = Post::find($postId);
        * // dd($post);
        * 
        * return view('post.show', [
            * 'post' => $post
        * ]);
    * }
    *
    * // T4|C18 : Create index method in controller
    * public function index()
    * {   
        * // Extract all post data from database
        * $categories = Category::all();
        * // Various posibilites
        * // $posts = Post::take(2)->get();
        * // $posts = Post::paginate(2);
        * $posts = Post::take(3)->latest('published_at')->get();
        * // dd($posts);
        *
        * // Send that data to view for displaying
        * return view('post.index', [
            * 'posts' => $posts,
            * 'categories' => $categories
        * ]);
    * }
 * }
**/