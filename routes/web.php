<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// T1|C5 : Route to return a simple string
Route::get('/string', function () {
    return 'Simple text is returned from route';
});

// T1|C5 : Route to return a json response
Route::get('/json', function () {
    return ['foo' => 'bar'];
});

// T1|C5 : Route to return a view
Route::get('test', function () {
    return view('test');
});

// T2|C14 : Default route for homepage or welcome page
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

// T1|C6 : Fetch some data from query string via route
//      Also, send it to the view via route
// http://127.0.0.1:8000/querydata?name=Jony+Decusa
Route::get('/querydata', function () {
    // Here $name means a variale creation
    $name = 'The username provided in querydata is "' . request('name') . '"';

    // CASE A : Simply returning data directly from route
    // Here $name means we are returning variable value
    // return $name;
    // The username provided in querydata is "Jony Decusa"

    // CASE B : Returing data via view
    // [HACK ALERT] <script>alert('Hello User');</script>
    return view('test', [
        'name' => $name
    ]);
});

// T1|C7 : Route Wildcard
// 127.0.0.1:8000/posts/my-second-post
// String after pagename will be available in $post variable in get function
// Route::get('/posts/{post}', function ($post) {
//     // Demo database created for this specific use case
//     $posts = [
//         'my-first-post' => 'Hello , this is my first blog post',
//         'my-second-post' => 'Now i am getting the hang of this blogging thing.'
//     ];

//     // Handle Array key not found error (IndexOutOfBound)
//     // If whatever is in $post does'nt exit as key in $posts array
//     if (!array_key_exists($post, $posts)) {
//         abort(404, 'Sorry, that post was not found');
//     }
//     // else return view with value extracted from $posts array
//     return view('post', [
//         'postdata' => $posts[$post] ?? 'Nothing here yet.'
//     ]);
// });

// T4|C18 : Using Controller index method
Route::get('/posts', 'PostController@index')->name('posts.index');

// T4|C23 : Create new post
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/create', 'PostController@create')->name('posts.create');

// T1|C8 : Routing to Controller
// This will override above route function
// Transfering all computation from above route to controller
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

//T4|C24 : Edit existing post
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/posts/{post}', 'PostController@update')->name('posts.update');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
