<header>
    <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo-white.png') }}" class="logo" alt="Antiquea Logo">
    </a>
    <form class="search-bar" action="{{ url('search') }}" method="get">
        <img src="{{ asset('icons/search.svg') }}" class="icon">
        <input type="text" id="search" name="search" value="{{ request()->get('search', '')}}"
                placeholder="Sem zadajte hľadaný nábytok ..." onChange="search()">
    </form>
    <div class="login-user">
        @if (Auth::check())
            <img class="icon" src="{{ asset('icons/magician.svg') }}">
            <p>Admin: {{ Auth::user()->email }}</p>
        @endif
    </div>
    @if (Auth::check())
    <form action="{{ url('logout') }}" method="post">
        @csrf
        <button type="submit" class="button loginout">
            Odhlásiť sa
        </button>
    </form>
    @endif
</header>