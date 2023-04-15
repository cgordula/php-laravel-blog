@extends('layouts.app')

@section('content')
    <form method="POST" action="/posts/{{$post->id}}" class="ms-auto me-auto w-75">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title" class="fw-bold">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
    </div>

    <div class="form-group">
        <label for="content" class="mt-3 fw-bold">Content</label>
        <textarea name="content" id="content" rows="4" class="form-control">{{$post->content}}</textarea>
    </div>
    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Update Post</button>
        
    </div>
    </form>

@endsection