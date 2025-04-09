<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">MyPortfolio</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('skills') ? 'active' : '' }}" href="{{ url('/skills') }}">Skills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('projects') ? 'active' : '' }}" href="{{ url('/projects') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blogs') ? 'active' : '' }}" href="{{ url('/blogs') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about-me') ? 'active' : '' }}" href="{{ url('/about-me') }}">About-me</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('my-resume') ? 'active' : '' }}" href="{{ url('/my-resume') }}">Resume</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
