@extends('layouts.app')

@section('title', 'New Post')

@section('content')
<div class = "create_title">
  <h1>
  新規投稿
  </h1>
  <!-- <a href = "{{ url('/') }}" class = "header-menu">戻る</a> -->
  </div>
<div class = "create_field">
<div class = "create_form">
<form method = "post" action = "{{ url('/posts') }}" enctype = "multipart/form-data">
{{  csrf_field() }}

<p>
<div id="app">
  <image-component></image-component>
</div>
</p>


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

<input type = "submit" value = "Add">
</div>
</div>

</form>
<script src="{{ asset('/js/app.js') }}"></script>

@endsection