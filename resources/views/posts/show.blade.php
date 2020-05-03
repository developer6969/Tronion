@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px">
        <div class="row">
            <div class="col-lg-4">
                <img src="/assets/blog/{{ $post->image }}" width="100%" height="auto">
                <a href="{{ route('posts.index') }}" class="btn btn-sm">Back</a>
                <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-sm">Edit</a>
                <form method="POST" action="{{ route('posts.delete', $post->slug) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-sm btn-link" value="Delete" style="text-decoration: none !important;">
                </form>
                <a href="/posts/{{ $post->slug }}/share" class="btn btn-sm">Share</a>
                <a href="/posts/{{ $post->slug }}/favorite" class="btn btn-sm">Favorite</a>
            </div>
            <div class="col-lg-8">
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->body }}</p>
            </div>
        </div>
    </div>
@endsection

<style>
    .btn {
        width: 100% !important;
    }
</style>