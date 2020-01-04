<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use Intervention\Image\ImageManagerStatic as Image;

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
    public function store(PostRequest $request) {
        $request->validate([
            'image'=>'required|image|mimes:jpg,jpeg,png|max:2000'
        ]);
        $file=$request->file('image');
        $fileName=str_random(20).'.'.$file->getClientOriginalExtension();
        Image::make($file)->save(public_path('img/'.$fileName));
        


        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $fileName;
        // $request->file('image')->storeAs('public/avatar');
        $post->save();
        return redirect('/');
        
    }

    public function edit(Post $post) {
        return view('posts.edit',['post' => $post]);

    }

    public function update(PostRequest $request, Post $post) {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $request->image;
        $post->save();
        return redirect('/');
        
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect('/');
    }

}
