<nav>
    <ul>
        @auth
       <li><a href="{{ route('profile.index') }}">Profile</a></li>
       @endauth
       <li><a href="{{ route('weblogs.index') }}">Weblogs</a></li>
       @auth
       <li><a href="{{ route('weblogs.create') }}">Maak een weblog</a></li>
       <li><a href="{{ route('profile.premium') }}">Weblog Premium</a></li>
       @endauth
       <li><a href="{{ route('logout') }}">Login/Logout</a></li>
    </ul>
</nav>