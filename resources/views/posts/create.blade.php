@extends('layouts.app')

@section('title', 'New Post')

@section('content')
<h1>
<a href = "{{ url('/') }}" class = "header-menu">BACK</a>
New Post
</h1>
<form method = "post" action = "{{ url('/posts') }}" enctype = "multipart/form-data">
{{  csrf_field() }}

<p>
<input type = "text" name ="title" placeholder = "title" value = "{{ old('title') }}">
@if ($errors->has('title'))
<span class = "error">{{ $errors->first('title') }}</span>
@endif
</p>

<p>
<textarea name = "body" placeholder = "body" >{{ old('body') }}</textarea>
@if ($errors->has('body'))
<span class = "error">{{ $errors->first('body') }}</span>
@endif
</p>



<p>
<div id="app">
  <image-component></image-component>
</div>
<input type = "submit" value = "Add">
</p>

</form>
<script src="{{ asset('/js/app.js') }}"></script>

@endsection