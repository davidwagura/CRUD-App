<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>congrats your logged in</p>
    <form action="/logout" method="POST">
    @csrf
    <button>log out</button>
    </form>



    <div style="border: 3px solid black;">
    <h2>creat a New Post</h2>
    <form action="/creat-post">
      @csrf  
      <input type="text" name="title" placeholder="post title">
      <textarea name="body" placeholder="body content..."></textarea>
      <button>Save Post</button>
    </form>
    </div>

     
    <div style="border: 3px solid black;">
        <h2>All Post</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin: 10px;">
        <h3>{{$post['title']}}</h3>
        {{$post['body']}}
        <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
        <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method(DELETE)
            <button>Delete</button>
        </form>
        
        </div>
        @endforeach
        


    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">   
            <button>Register</button> 
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">   
            <button>log in</button> 
        </form>
    </div>

     
    @endauth
</body>
</html>