<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@auth
<p> Congrats, your are logged in!</p>
<form action="/logout" method="POST">
@csrf
 <button>Logout</button>
</form>
 <div style="border: 3px solid black;">
<h2>Create new diary entry</h2>
<form action="/create-post" method="POST">
@csrf
<input type="text" name="title" placeholder="Entry title">
<textarea name="body" placeholder="content...."></textarea>
<button>Save enttry</button>
</form>
</div>

<div style="border: 3px solid black;">
<h2>All entries</h2>
@foreach($posts as $post)
<div style="background-color:gray;padding: 10px,margin:10px">

<h3>
    {{$post['title']}}
</h3>
{{$post['body']}}
<p><a href="/edit-post/{{$post->id}}">Edit</a></p>
<form action="/delete-post/{{$post->id}}" method="POST">
@csrf
@method('DELETE')
<button>Delete</button>
</form>
</div>
@endforeach



</div>





@else 
<div style="border: 3px solid black;">
    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf
        <input name="name" type="text" placeholder="Name">
        <input name="email" type="text" placeholder="Email">
        <input name= "password" type="password" placeholder="Password">
        <button>Register</button>
    </form>

    <div style="border: 3px solid black;">
    <h2>Log in</h2>
    <form action="/login" method="POST">
        @csrf
        <input name="loginname" type="text" placeholder="Name">
        <input name= "loginpassword" type="password" placeholder="Password">
        <button>Log in</button>
    </form>
@endauth


</body>
</html>