@extends('layouts.app')

@section('title','Blog Posts')

@section('content')
    <h1>
    Blog Posts
    </h1>
    <a href = "{{ url('/posts/create') }}" class = "header-menu">NEW</a>
    <ul>
  @forelse ($posts as $post)
  <li>
  <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
  <p>{{ $post->image }}</p>
  <img src="{{ asset('/public/img/'.$post->image) }}">
  <!-- <img src = "{{ $post->image }}"> -->
    <a href="{{ action('PostsController@edit', $post) }}" class="edit">[Edit]</a>
    <a href="#" class="delete" data-id="{{ $post->id }}">[x]</a>
    <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}"　enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>
  </li>
  @empty
  <li>No posts yet</li>
  @endforelse
</ul>
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
</html>