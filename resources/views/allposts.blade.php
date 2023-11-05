<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div class="auth-buttons">
    @auth
    <a href="/" class="home-button" style="margin-left: 10px;">Home</a>
            <form action="/logout" method="POST" style="display: inline;">
                @csrf
                <button type="submit" 
                class="logout-button">Logout</button>
            </form>
        </div>
    </div>
    @else
    @endauth
</div>

</div>

<div class="all-posts">
    <h2>All Posts</h2>
    @foreach($posts as $post)
    <div class="post">
        <h3>{{$post['title']}}</h3>
        
        <img src="{{ asset('images/' . $post->image) }}" alt="Post image" class="post-image">
        
        <p>{!! $post['body'] !!}</p>
        <p class="author">By {{$post->user->name}}</p>
    </div>
    @endforeach
</div>
</body>
</html>