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
                <div class="card-body">
                    User posts grid will be displayed here later
                </div>
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
