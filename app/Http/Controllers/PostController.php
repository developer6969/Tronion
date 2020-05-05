<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // It protects from unauthorised user to access the
    // functions of this controller except 'index' & 'show'
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /** AUTHORISATION LEVEL : None **/

    // Display a listing of the resource.
    public function index()
    {
        return view('posts.index', [
            'categories' => Category::all(),
            'posts' => Post::latest('published_at')->get()
        ]);
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

    /** AUTHORISATION LEVEL : Registered User **/

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
            'extract' => request('extract'),
            'body' => request('body'),
            'image' => 'blog_2.jpg',
            'published_at' => now(),
            'user_id' => Auth::user()->id,
        ]);
        
        // OPTIONAL when no data manipulation is required 
        // Post::create($validatedAttributes);
        
        return redirect(route('posts.index'));
    }

    /** AUTHORISATION LEVEL : Registered User with Author **/

    // Show the form for editing the specified resource.
    public function edit(Post $post)
    {
        if ($this->isUserTheAuthor($post->user_id)) {
            // Allow to edit resource
            return view('posts.edit', ['post' => $post]);
        } else {
            // Reject & redirect
            return view('posts.show', ['post' => $post]);
        }
    }

    // Update the specified resource in storage.
    public function update(Request $request, Post $post)
    {
        if ($this->isUserTheAuthor($post->user_id)) {
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
        } else {
            return view('posts.show', ['post' => $post]);
        }
    }

    // Remove the specified resource from storage.
    public function destroy(Post $post)
    {
        if ($this->isUserTheAuthor($post->user_id)) {
            $post->delete();
            return redirect(route('posts.index'));
        } else {
            return view('posts.show', ['post' => $post]);
        }
    }

    /** HELPER FUNCTIONS **/

    // Verify wheather a given user IS the AUTHOR of given post
    public static function isUserTheAuthor($user_id)
    {
        // Only the author can edit access from here
        return (Auth::user()->id == $user_id);
    }

    // Takes title as param and return slugged version of that string
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
    
    // It validates all required conditions of a post
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