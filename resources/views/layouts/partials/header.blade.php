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
            @if (session('status'))
            <div id="cart-notification">1</div>
            @endif
        </a>
    </div>
    <nav class="product-categories">
        <ul>
            <li><a href="{{ url('products/living-room') }}">Obývačka</a></li>
            <li><a href="{{ url('products/children-room') }}">Detská izba</a></li>
            <li><a href="{{ url('products/bedroom') }}">Spálňa</a></li>
            <li><a href="{{ url('products/kitchen') }}">Kuchyňa</a></li>
            <li><a href="{{ url('products/bathroom') }}">Kupeľňa</a></li>
            <li><a href="{{ url('products/office') }}">Pracovňa</a></li>
        </ul>
    </nav>
</header>