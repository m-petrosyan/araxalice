<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New message</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <style>
        body {
            color: white;
            background-color: #1b1b1b;
        }

        .logo {
            text-align: center;
            width: 80%;
            opacity: .7;
        }
    </style>
</head>
<body class="antialiased">
<div class="content">
    <div>
        <p>from: </p>
        <p>{{$from}}</p>
    </div>
    <hr/>
    <div>
        <p>message: </p>
        <p>{{$text}}</p>
    </div>
    <img src="{{asset('static/logo.png')}}" alt="logo" class="logo">
</div>
</body>
</html>
