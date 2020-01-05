@extends('layouts.app')

@section('title', $post->title)

@section('content')
<h1>
<a href = "{{ url('/') }}" class = "header-menu">BACK</a>
{{ $post->title }}
</h1>
<p>{!! nl2br(e($post->body)) !!}</p>

<h2>comment</h2>

<ul>
  @forelse ($post->comments as $comment)
  <li>
  {{ $comment->body}}
  <a href="#" class="delete" data-id="{{ $comment->id }}">[x]</a>
    <form method="post" action="{{ action('CommentsController@destroy', [$post,$comment]) }}" id="form_{{ $comment->id }}">
      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>
  </li>
  @empty
  <li>No comment yet</li>
  @endforelse
</ul>

<form method = "post" action = "{{ action('CommentsController@store',$post) }}">
{{  csrf_field() }}

<p>
<input type = "text" name ="body" placeholder = "title" value = "{{ old('body') }}">
@if ($errors->has('title'))
<span class = "error">{{ $errors->first('title') }}</span>
@endif
</p>
<p>
<input type = "submit" value = "comment">
</p>

</form>
<script src="{{ asset('/js/app.js') }}"></script>
@endsection