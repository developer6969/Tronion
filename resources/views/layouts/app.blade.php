<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Site</title>

    {{-- T3|C17 : SASS --}}
    <link rel="stylesheet" href="css/app.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .footer,
        .topnav {
            /* Add a black background color to the top navigation */
            background-color: #333;
            overflow: hidden;
            padding: 0px 20px;  
        }
        
        /* Style the links inside the navigation bar */
        .topnav a {
            float: right;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        
        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #ddd; 
            color: black;
        }
        
        /* Add a color to the active/current link */
        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }

        .footer {
            padding: 20px;
            color: lightgray;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="topnav">
        <a class="{{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
        <a class="{{ Request::is('blog') ? 'active' : '' }}" href="/blog">Blog</a>
        <a class="{{ Request::path() === '/' ? 'active' : '' }}" href="/">Home</a>
    </div>
    
    <div style="height: 500px; margin: 20px 60px;">
        @yield('content')
    </div>
    
    <div class="footer">
        My Blog Site @ Copyright 2020
    </div>
</body>
</html>