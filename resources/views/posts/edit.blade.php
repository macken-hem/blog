@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<h1>
EDIT
</h1>
<form method = "post" action = "{{ url('/posts', $post->id) }}">
{{  csrf_field() }}
{{ method_field('patch') }}

<p>
<div id="app">
<img src="{{ asset('/public/img/'.$post->image) }}">
  <image-component></image-component>
</div>
</p>

<p>
<input type = "text" name ="title" placeholder = "title" value = "{{ old('title', $post->title) }}">
@if ($errors->has('title'))
<span class = "error">{{ $errors->first('title') }}</span>
@endif
</p>

<p>
<textarea name = "body" placeholder = "body" >{{ old('body',$post->body) }}</textarea>
@if ($errors->has('body'))
<span class = "error">{{ $errors->first('body') }}</span>
@endif
</p>


<p>
<input type = "submit" value = "Update">
</p>

</form>
<script src="{{ asset('/js/app.js') }}"></script>

@endsection