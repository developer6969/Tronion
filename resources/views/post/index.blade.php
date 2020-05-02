@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px">
    <div class="row">
        <div class="col-9">
        <h4>Recent Blog Posts</h4>
            <ul class="list-group">
                @foreach ($posts as $post)
                <a href="/posts/{{ $post->slug }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $post->title }}</h5>
                        <small>2 days ago</small>
                    </div>
                    <p class="mb-1">{{ $post->extract }}</p>
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