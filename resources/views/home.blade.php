@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header d-flex w-100 justify-content-between">
                    <h6 class="mt-2">{{ Auth::user()->name }}'s Blog Posts</h6>
                    <a class='btn btn-sm btn-success' href="{{ route('posts.create') }}">Create New Post</a>
                </div>
                @foreach ($posts as $post)
                <a href="{{ $post->path() }}" class="list-group-item list-group-item-action flex-column align-items-start"
                    style="border: 1px solid #88888830">
                    <div class="row" style="height: 120px">
                        <div class="col-3" style="padding-right: 0px !important; padding-left: 8px !important;">
                            <img src='assets/blog/{{ $post->image }}' width="100%" height="100%">
                        </div>
                        <div class="col-9" style="postion: relative">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 show-only-one-line">
                                    {{ $post->title }}
                                </h5>
                            </div>
                            <div class="show-only-two-lines">
                                <p class="mb-1">{{ $post->extract }}</p>
                            </div>
                            <div class="post-footer d-flex justify-content-between">
                                <small>Written By <i>{{ $post->user->name }}</i></small>
                                <small>{{ $post->time_elapsed_string($post->created_at) }}</small>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="card my-4">
                <div class="card-header d-flex w-100 justify-content-between">
                    <h6 class="mt-2">User Profile</h6>
                    <a class="btn btn-sm btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        Username : <b>{{ auth()->user()->name }}</b><br>
                        Email Id : <b>{{ Auth::user()->email }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- Alternative --}}
{{-- <a href="{{ $post->path() }}" style="text-decoration: none; color: #222222">
    <div class="row">
        <div class="col-4">
            <img src='/assets/blog/{{ $post->image }}' width="100%" height="100%"/>
        </div>
        <div class="col-8">
            <p class='font-weight-bold'>{{ $post->title }}</p>
            <p>{{ $post->extract }}</p>
        </div>
    </div>
</a>
<div style="border: 1px solid #f4f4f4"></div>
<div style="border: 5px solid #00000000"></div> --}}
