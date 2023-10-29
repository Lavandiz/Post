<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("title")</title>

        @vite('resources/css/app.css')


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex item-center">
                <li><a class="p-3" href="/">Home</a> </li>
                <li><a class="p-3" href="{{ route('dashboard') }}">Dashboard</a> </li>
                <li><a class="p-3" href="{{ route('posts') }}">Post</a> </li>
            </ul>
            <ul class="flex item-center">
                @auth
                <li><a class="p-3" href="/">{{ auth()->user()->name }}</a> </li>
                <li><form action="{{ route('logout') }}" class="inline p-3" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form></li>
                @endauth
                @guest
                <li><a class="p-3" href="{{ route('login') }}">Login</a> </li>
                <li><a class="p-3" href="{{ route('register') }}">Register</a> </li>
                @endguest
               
                
                
            </ul>            
        </nav>
        @yield("content")
    </body>
</html>