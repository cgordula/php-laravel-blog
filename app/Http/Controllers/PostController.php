<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // action to return a view containing a form for post creation
    public function create() {
        return view('posts.create');
    }
}
