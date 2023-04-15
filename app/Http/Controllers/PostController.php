<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// to access with the authenticated user
use Illuminate\Support\Facades\Auth;
// To have access with queries related to the Post Entity/Model
use App\Models\Post;



class PostController extends Controller
{
    // action to return a view containing a form for post creation
    public function create() {
        return view('posts.create');
    }

    // action to receive the form data and subsequently store the data in the post table
    public function store(Request $request) {
        // check if there is an authenticated user
        if(Auth::user()) {
            // instantiate a new post object from the Post Model
            $post = new Post;
            // define the properties of the $post object using the receive form data
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            // get the id of the authenticated user and set it as the foreign key (user_id)
            $post->user_id = (Auth::user()->id);
            // save this post object in the database
            $post->save();

            return redirect('/posts');

        }
        else {
            return redirect('/login');
        }
    }

    // action that will return a view showing all blog posts
    public function index() {
        $posts = Post::all();
        // The 'with()' method will allow us to pass information from the controller to view the page
        return view('posts.index')->with('posts', $posts);
    }

    // action that will return 3 random posts view
    public function welcome() {
        $posts = Post::where('isActive', true)->inRandomOrder()->limit(3)->get();
        return view('welcome')->with('posts', $posts);
    }

    // action to show only the posts authored byt the authenticated user
    public function myPost() {
        if(Auth::user()) {
            $posts = Auth::user()->posts;
            return view('posts.index')->with('posts', $posts);
        }
        else {
            return redirect('/login');
        }
    }

    // action that will return a view showing a specific post using the URL parameter $id to query for the database entry to be shown.
    public function show($id) {
        $post = Post::find($id);
            return view('posts.show')->with('post', $post);
    }

    // action that will return an edit form for a specific post when a GET request is received at the /posts/{id}/edit endpoint.
    public function edit($id) {
        $post = Post::find($id);
        if(Auth::user()) {
            if(Auth::user()->id == $post->user_id) {
                return view('posts.edit')->with('post', $post);
            }
            return redirect('/posts');
        }
        else {
            return redirect('/login');
        }
    }

}
