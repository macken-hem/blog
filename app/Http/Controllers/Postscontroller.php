<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class Postscontroller extends Controller
{
    public function index() {
        $posts = Post::latest()->get();
        return view('posts.index',['posts' => $posts]);
    }

    public function show(Post $post) {
        return view('posts.show',['post' => $post]);

    }

    public function create() {
        return view('posts.create');
        
    }
}
