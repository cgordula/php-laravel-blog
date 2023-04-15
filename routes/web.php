<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route to create a post
Route::get('/posts/create', [PostController::class, 'create']);

// route wherein the form data will be sent via POST method to the /posts URI endpoint
Route::post('/posts', [PostController::class, 'store']);

// route that will return a view containing all the posts
Route::get('/posts', [PostController::class, 'index']);

// route that will return a view for the welcome page
Route::get('/', [PostController::class, 'welcome']);

// route that will return a view containing only the authenticated user's posts
Route::get('/myPost', [PostController::class, 'myPost']);

// route wherein a view showing a specific post with matching URL parameter ID ({}) that will be returned to the user
Route::get('/posts/{id}', [PostController::class, 'show']);

// route that will return an edit form for a specific Post
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);

// route that will overwrite an existing post with matching URL parameter ID via PUT method
Route::put('posts/{id}', [PostController::class, 'update']);

// route that will delete a post of the matching URL parameter
// Route::delete('/posts/{id}', [PostController::class, 'destroy']);

// route that will archive a post
Route::delete('posts/{id}', [PostController::class, 'archive']);