<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
  <h1>Edit Post</h1>
  <form method="POST" action="/edit-post/{{ $post->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ $post->title }}">
  
    <label for="body">Body</label>
    <textarea id="body" name="body">{{ $post->body }}</textarea>
  
    <label for="image">Image</label>
    <input type="file" id="image" name="image">
  
    <button type="submit">Update Post</button>
  </form>
  
  <script src="https://cdn.tiny.cloud/1/fi43097xqvh7iz8io6me0c3w1tqptas6ezt4fgu8kilsavd8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Initialize TinyMCE -->
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
      tinymce.init({
          selector: '#body',
      plugins: 'image code lists',
          toolbar: 'undo redo | link image | code| numlist bullist',
          width : 600
      });
  });
  </script>
</body>
</html>