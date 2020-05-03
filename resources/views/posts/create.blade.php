@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px">
        <div class="row">
            <div class="col-9">
                <h4>Create New Post</h4>
                {{-- <form method="POST" action="/posts"> --}}
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Post Title" required>
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
                        <textarea name="extract" class="form-control" rows="1" placeholder="Breif Introduction" required></textarea>
                    </div>
                    <div class="form-group"> 
                        <textarea name="body" class="form-control" rows="3" placeholder="Full description" required></textarea>
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





{{-- 
<div class="form-group"> 
    <textarea name="extract" rows="1" placeholder="Breif Introduction" required
    class="form-control {{ $errors->has('title') ? 'is-danger' : '' }}">
        {{ old('extract') }}
    </textarea>
    @if ($errors->has('extract'))
        <p class="help text-danger">{{ $errors->first('extract') }}</p>
    @endif
</div>
<div class="form-group"> 
    <textarea name="body" rows="3" placeholder="Full description" required
    class="form-control @error('title') is-danger @enderror"></textarea>
    @error('title')
        <p class="help text-danger">{{ $errors->first('body') }}</p>
    @enderror
</div> --}}