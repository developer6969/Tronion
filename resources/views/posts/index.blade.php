@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
@endsection

@section('content')
<div class="container" style="padding: 20px">
    <div class="row">
        <div class="col-9">
        <h4>Recent Blog Posts</h4>
            <ul class="list-group">
                @foreach ($posts as $post)
                <a href="{{ $post->path() }}" class="list-group-item list-group-item-action flex-column align-items-start"
                    style="border: 1px solid #88888830">
                    <div class="row" style="height: 120px">
                        <div class="col-3" style="padding-right: 0px !important; padding-left: 8px !important;">
                            <img src='assets/blog/{{ $post->image }}' width="100%" height="auto">
                        </div>
                        <div class="col-9" style="postion: relative">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 show-only-one-line">{{ $post->title }}</h5>
                            </div>
                            <div class="show-only-two-lines">
                                <p class="mb-1">{{ $post->extract }}</p>
                            </div>
                            <div class="post-footer d-flex justify-content-between">
                                <small>Written By <i>{{ $post->user->name }}</i></small>
                                <small>5 views</small>
                                <small>{{ $post->time_elapsed_string($post->created_at) }}</small>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </ul>
        </div>
        <div class="col-3">
            <h4>Categories</h4>
            <ul class="list-group">
                @foreach ($categories as $category)
                <a href="/posts/{{ $category->id }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1">{{ $category->name }}</p>
                    </div>
                </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection