@extends('layouts.app');

@section('content')
    {{-- If there are post created it will be displayed on our views --}}
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card text-center my-2">
                <div class="card-body">
                    <h4 class="card-title mb-3">
                        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    </h4>
                    <h6 class="card-text mb-3">Author: {{$post->user->name}}</h6>
                    <p class="card-subtitle text-muted mb-3">Created at: {{$post->created_at}}</p>

                    @if(Auth::user())
                        @if(Auth::user()->id == $post->user_id)
                            <div class="card-footer">
                                <form method="POST" action="/posts/{{$post->id}}">
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary mt-3">Edit Post</a>

                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger mt-3">Delete Post</button>
                                </form>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    @else 
        <div>
            <h2>There are no post to show.</h2>
            <a href="/posts/create" class="btn btn-info">Create Post</a>
        </div>
    @endif

@endsection