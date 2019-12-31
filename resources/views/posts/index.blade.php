@extends('layouts.default')

@section('title','Blog Posts')

@section('content')
    <h1>Blog Posts</h1>
    <ul>
    @foreach ($posts as $post)
      <li><a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a></li>
    @endforeach
    </ul>
@endsection
</html>