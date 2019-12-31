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
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:1',
            'body' => 'required'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $request->image;
        $post->save();
        return redirect('/');
        
    }

    public function edit(Post $post) {
        return view('posts.edit',['post' => $post]);

    }

    public function update(Request $request, Post $post) {
        $this->validate($request, [
            'title' => 'required|min:1',
            'body' => 'required'
        ]);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $request->image;
        $post->save();
        return redirect('/');
        
    }

}
