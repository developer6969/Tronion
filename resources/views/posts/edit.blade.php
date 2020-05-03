@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px">
        <div class="row">
            <div class="col-9">
                <h4>Edit Post</h4>
                    {{-- <form method="POST" action="/posts/{{$post->slug}}"> --}}
                    <form method="POST" action="{{ route('posts.update', $post->slug) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Post Title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <select class="form-control" name="category">
                                <option>Choose Category</option>
                                <option>Wordpress</option>
                                <option>Laravel</option>
                                <option>Javascript</option>
                                <option>SQL Database</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <textarea class="form-control" name="extract" rows="1" placeholder="Breif Introduction">{{ $post->extract }}</textarea>
                    </div>
                    <div class="form-group"> 
                        <textarea class="form-control" name="body" rows="3" placeholder="Full description">{{ $post->body }}</textarea>
                    </div>
                    <div class="form-group"> 
                        <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <input type="reset" class="btn btn-sm btn-outline-secondary"></a>
                        <input type="submit" class="btn btn-sm btn-outline-primary"></a>
                    </div>
                </form>
            </div>
            <div class="col-3">
                <ul class="list-group">
                    <li class='list-group-item text-uppercase'><strong>Writting Guidelines</strong></li>
                    <li class='list-group-item'>Lorem ipsum, dolor sit amet</li>
                    <li class='list-group-item'>Sequi reprehenderit praesentium vero aperiam.</li>
                    <li class='list-group-item'>Consectetur adipisicing elit.</li>
                    <li class='list-group-item'>Qdeleniti laboriosam illo iste doloribus id quam officiis?</li>
                </ul>
            </div>
        </div>
    </div>
@endsection