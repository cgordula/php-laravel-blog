{{-- @extends directives "extend" a template which defines its own section --}}
@extends('layouts.app')

{{-- @section directives will inject the page content in the "app.blade.php" --}}
@section('content')
    <form method="POST" action="/posts" class="ms-auto me-auto w-75">
    @csrf
    
    <div class="form-group">
        <label for="title">Title:</label>
        <textarea name="content" id="content" class="form-control"></textarea>
    </div>
    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Create Post</button>
    </div>
    </form>
@endsection