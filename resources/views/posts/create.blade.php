{{-- @extends directives "extend" a template which defines its own section --}}
@extends('layouts.app')

{{-- @section directives will inject the page content in the "app.blade.php" --}}
@section('content')
    <form method="POST" action="/posts" class="ms-auto me-auto w-75">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" rows="4"  class="form-control"></textarea>
    </div>
    
    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Create Post</button>
    </div>
    </form>
@endsection