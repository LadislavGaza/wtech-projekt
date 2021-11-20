<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Antiquea - Admin</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/admin-stock.css">
</head>
<body>
    <header>
        <a href="index.html">
            <img src="{{ asset('images/logo-white.png') }}" class="logo" alt="Antiquea Logo">
        </a>
        <div class="search-bar">
            <img src="{{ asset('icons/search.svg') }}" class="icon">
            <input type="text" id="search" placeholder="Sem zadajte hľadaný produkt ...">
        </div>
        <div class="login-user">
            <img class="icon" src="{{ asset('icons/magician.svg') }}">
            <p>Admin účet</p>
        </div>
        <a href="login.html" class="button">
            Odhlásiť sa
        </a>
    </header>
    <main id="product-stock">
        <a href="admin-product.html" class="btn" id="new-product">
            <img src="{{ asset('icons/plus-lg.svg') }}" class="icon">
            Nový produkt
        </a>
        <table id="admin-product-stock">
            <thead>
                <th></th>
                <th>Produkt</th>
                <th>V ponuke</th>
                <th>Na sklade</th>
                <th>Cena</th>
                <th>Akcie</th>
            </thead>
            <tbody>
                <tr>
                    <td><img class="product-image" src="{{ asset('images/sofa.jpg') }}"></td>
                    <td><a href="admin-product.html">Holandský barokový kabinet</a></td>
                    <td><img class="icon" src="{{ asset('icons/eye.svg') }}"></td>
                    <td>8 ks</td>
                    <td>700 €</td>
                    <td>
                        <a href="furniture.html">
                            <img class="icon" src="{{ asset('icons/box-arrow.svg') }}">
                        </a>
                        <img class="icon" src="{{ asset('icons/x-lg.svg') }}">
                    </td>
                </tr>
                <tr>
                    <td><img class="product-image" src="{{ asset('images/sofa.jpg') }}"></td>
                    <td><a href="admin-product.html">Modernistická stolová lampa</a></td>
                    <td><img class="icon" src="{{ asset('icons/eye-slash.svg') }}"></td>
                    <td>0 ks</td>
                    <td>40 €</td>
                    <td>
                        <a href="furniture.html">
                            <img class="icon" src="{{ asset('icons/box-arrow.svg') }}">
                        </a>
                        <img class="icon" src="{{ asset('icons/x-lg.svg') }}">
                    </td>
                </tr>
                <tr>
                    <td><img class="product-image" src="{{ asset('images/sofa.jpg') }}"></td>
                    <td><a href="admin-product.html">Benátsky rokokový konferenčný stolík</a></td>
                    <td><img class="icon" src="{{ asset('icons/eye.svg') }}"></td>
                    <td>6 ks</td>
                    <td>2200 €</td>
                    <td>
                        <a href="furniture.html">
                            <img class="icon" src="{{ asset('icons/box-arrow.svg') }}">
                        </a>
                        <img class="icon" src="{{ asset('icons/x-lg.svg') }}">
                    </td>
                </tr>
                <tr>
                    <td><img class="product-image" src="{{ asset('images/sofa.jpg') }}"></td>
                    <td><a href="admin-product.html">Pohovka Bauhaus Chrome</a></td>
                    <td><img class="icon" src="{{ asset('icons/eye.svg') }}"></td>
                    <td>4 ks</td>
                    <td>720 €</td>
                    <td>
                        <a href="furniture.html">
                            <img class="icon" src="{{ asset('icons/box-arrow.svg') }}">
                        </a>
                        <img class="icon" src="{{ asset('icons/x-lg.svg') }}">
                    </td>
                </tr>
            </tbody>
        </table>
        <nav class="pagination content-middle">
            <ul>
                <li><a href="#">&lt;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&gt;</a></li>
            </ul>
        </nav>
    </main>
    <footer>
        <p class="copyright">Gaža &amp; Hájek &copy; 2021</p>
    </footer>
</body>
</html>