<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
 <div class="navbar">
        <div>
            <a href="/" class="logo">
            <img src="{{ url('images/logo.png') }}" alt="Blogger Logo">
        </a>
        </div>
        <br>

        @auth
            <div>
                <a href="{{ url('/all-posts') }}">All Posts</a>
                <form action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" 
                    class="logout-button">Logout</button>
                </form>
            </div>
            
        @else
        @endauth
    </div>

@auth

  <p>Congrats you are logged in.</p>
 
  
  <div class="create-post">
    <h2>Create a New Post</h2>
    <form action="/create-post" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" name="title" placeholder="post title">
      <textarea id="body" name="body" placeholder="body content..."></textarea>
      <input type="file" name="image">
      <button>Save Post</button>
    </form>
  </div>
  <div style="clear: both;"></div>
  

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


  
<div class="all-posts">
  <h2>Your Posts</h2>
  @foreach($posts as $post)
  <div class="post">
      <h3>{{$post['title']}}</h3>
      
   
      <img src="{{ asset('images/' . $post->image) }}" alt="Post image" class="post-image">
      
      <p>{!! $post['body'] !!}</p>
      <p class="author">By {{$post->user->name}}</p>
      <p><a href="/edit-post/{{$post->id}}" class="edit-button">Edit</a></p>
      <form action="/delete-post/{{$post->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="delete-button">Delete</button>
      </form>
  </div>
  @endforeach
</div>
  
  @else
  <div class="auth-container">
  <div class="auth-form">
    <h2>Register</h2>
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="name">
      <input name="email" type="text" placeholder="email">
      <input name="password" type="password" placeholder="password">
      <button>Register</button>
    </form>
  </div>
  
  <div class="auth-form">
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="name">
      <input name="loginpassword" type="password" placeholder="password">
      <button>Log in</button>
    </form>
  </div>
</div>
  @endauth
</body>
</html>