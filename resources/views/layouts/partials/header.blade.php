<header>
    <div class="toolbar">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="Antiquea Logo">
        </a>
        <div class="login-user">
            <img class="icon" src="{{ asset('icons/magician.svg') }}">
            <p>novotna@gmail.com</p>
        </div>
        <div class="search-bar">
            <img src="{{ asset('icons/search.svg') }}" class="icon">
            <input type="text" id="search" placeholder="Sem zadajte hľadaný nábytok ...">
        </div>
        <a href="{{ url('login') }}" class="button">
            Prihlásiť sa <img class="icon" src="{{ asset('icons/magician.svg') }}">
        </a>
        <a href="{{ url('cart') }}" class="button cart">
            Košík <img class="icon" src="{{ asset('icons/wagon.svg') }}">
        </a>
    </div>
    <nav class="product-categories">
        <ul>
            <li><a href="products.html">Obývačka</a></li>
            <li><a href="products.html">Detská izba</a></li>
            <li><a href="products.html">Spálňa</a></li>
            <li><a href="products.html">Kuchyňa</a></li>
            <li><a href="products.html">Kupeľňa</a></li>
            <li><a href="products.html">Pracovňa</a></li>
            <li><a href="products.html">Doplnky</a></li>
        </ul>
    </nav>
</header>