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

        .content {

        }
        .content:before {
            content: '';
            background-image: url("{{asset('static/logo.png')}}");
            background-position: center;
            background-size: contain;
            opacity: .7;
        }
    </style>
</head>
<body class="antialiased">
<div class="content">
    <table>
        <tr>
            <td>from:</td>
            <td>{{$from}}</td>
        </tr>
        <tr>
            <td>message:</td>
            <td>{{$text}}</td>
        </tr>
    </table>
</div>
</body>
</html>
