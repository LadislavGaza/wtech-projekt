<header>
    <div class="toolbar">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="Antiquea Logo">
        </a>
        <div class="login-user">
            @if (Auth::check())
                <img class="icon" src="{{ asset('icons/magician.svg') }}">
                <p>{{ Auth::user()->email }}</p>
            @else
                <p></p>
            @endif
        </div>
        <div class="search-bar">
            <img src="{{ asset('icons/search.svg') }}" class="icon">
            <input type="text" id="search" placeholder="Sem zadajte hľadaný nábytok ...">
        </div>
        @if (Auth::check())
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="button loginout">
                    Odhlásiť sa <img class="icon" src="{{ asset('icons/magician.svg') }}">
                </button>
            </form>
        @else
            <a href="{{ url('login') }}" class="button loginout">
                Prihlásiť sa <img class="icon" src="{{ asset('icons/magician.svg') }}">
            </a>
        @endif
        <a href="{{ url('cart') }}" class="button cart">
            Košík <img class="icon" src="{{ asset('icons/wagon.svg') }}">
        </a>
    </div>
    <nav class="product-categories">
        <ul>
            <li><a href="{{ url('products') }}">Obývačka</a></li>
            <li><a href="{{ url('products') }}">Detská izba</a></li>
            <li><a href="{{ url('products') }}">Spálňa</a></li>
            <li><a href="{{ url('products') }}">Kuchyňa</a></li>
            <li><a href="{{ url('products') }}">Kupeľňa</a></li>
            <li><a href="{{ url('products') }}">Pracovňa</a></li>
            <li><a href="{{ url('products') }}">Doplnky</a></li>
        </ul>
    </nav>
</header>