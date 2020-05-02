@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px">
        <img src="/assets/blog/{{ $post->image }}" width="50%">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
    </div>
@endsection