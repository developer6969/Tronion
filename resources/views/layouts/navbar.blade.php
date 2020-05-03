<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 10px 80px">
    <a class="navbar-brand" href="/">
        <img src="\assets\blog_logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-top">
        Blogger
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" 
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ml-auto">
            <li><a class="nav-item nav-link {{ Request::path() === '/' ? 'active' : '' }}" href="/">Home</a></li>
            <li><a class="nav-item nav-link {{ Request::is('blog') ? 'active' : '' }}" href="{{ route('posts.index') }}">Blog</a></li>
            <li><a class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a></li>
        </ul>
    </div>
</nav>