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
        // dump(request()->all());
        $validatedAttributes = $this->validatePost();

        // ONE WAY OF CREATING RESOURCE
        // $post = new Post();
        // $post->title = request('title');
        // $post->slug = $this->slugify(request('title'));
        // $post->extract = request('extract');
        // $post->body = request('body');
        // $post->image = 'blog_1.jpg';/*request('image');*/
        // $post->published_at = now();
        // $post->save();

        // It creats mass assingment error
        Post::create([
            'title' => request('title'),
            'slug' => $this->slugify(request('title')),
            'extract' => request('title'),
            'body' => request('title'),
            'image' => 'blog_2.jpg',
            'published_at' => now(),
        ]);
        
        // OPTIONAL when no data manipulation is required 
        // Post::create($validatedAttributes);

        return redirect(route('posts.index'));
    }

    // Display the specified resource.
    // We override method in Model to get Post in params
    public function show(Post $post)
    {
        // Default way of doing things
        // Post::where('slug', $post)->firstOrFail();
        // Post::findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }

    // Show the form for editing the specified resource.
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Post $post)
    {
        $post->title = request('title');
        $post->slug = $this->slugify(request('title'));
        $post->extract = request('extract');
        $post->body = request('body');
        $post->image = 'blog_1.jpg';/*request('image');*/
        $post->updated_at = now();
        $post->save();

        // return redirect('/posts/'. $post->slug);
        // return redirect(route('posts.show', $post));
        return redirect($post->path());
    }

    // Remove the specified resource from storage.
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('posts.index'));

    }

    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function validatePost()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:200'],
            'extract' => 'required',
            'body' => 'required'
        ]);
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