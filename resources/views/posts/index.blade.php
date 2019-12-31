<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Blog Posts</title>
</head>
<body>
  <div class="container">
    <h1>Blog Posts</h1>
    <ul>
    @foreach ($posts as $post)
      <li><a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a></li>
    @endforeach
    </ul>
  </div>
</body>
</html>