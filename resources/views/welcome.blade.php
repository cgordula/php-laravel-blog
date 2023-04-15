@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img src="https://cdn.freebiesupply.com/logos/large/2x/laravel-1-logo-png-transparent.png" class="img-fluid w-25">

        <h2 class="my-4">Featured Posts</h2>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="card-title mb-3">
                            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                        </h4>
                        <h6 class="card-text mb-3">Author: {{$post->user->name}}</h6>
                    </div>
                </div>
            @endforeach
        @else
                <div><h2>There are not posts to show.</h2></div>
        @endif
    </div>

@endsection