<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Antiquea - Admin</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/admin-product.css">
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
        <a href="login.html" class="btn button">
            Odhlásiť sa
        </a>
    </header>
    <main id="product-edit">
        <div id="upload-image">
            <img src="{{ asset('images/sofa.jpg') }}" width="300">
            <button class=login-user>
                <img class="icon" src="{{ asset('icons/card-image.svg') }}">
                Nahrať obrázok
            </button>
        </div>
        <form id="product-edit-form">
            <h1>Produkt</h1>
            <a href="furniture.html" class="admin-product-button">
                <img class="icon" src="{{ asset('icons/box-arrow.svg') }}">
                Zobraziť
            </a>
            <button type="submit" class="admin-product-button">
                <img class="icon" src="{{ asset('icons/save.svg') }}">
                Uložiť
            </button>
            <fieldset id="product-basic-info">
                <label for="product-name">Názov</label>
                <input type="text" id="product-name" class="name">
                <label for="product-desc">Popis</label>
                <textarea id="product-desc" class="desc"></textarea>      
            </fieldset>
            <fieldset id="product-availability">
                <label for="product-in-portfolio">V ponuke</label>
                <input type="checkbox" id="product-in-portfolio" class="in-portfolio">
                <label for="product-price">Cena</label>
                <input type="number" id="product-price" class="price">
                <label for="product-discount">Zľava</label>
                <input type="number" id="product-discount" class="discount">
                <label for="product-stock">Na sklade</label>
                <input type="number" id="product-stock" class="stock">
            </fieldset>
            <fieldset id="product-attributes">
                <h2>Parametre</h2>
                <label for="product-categories">Kategórie</label>  <!-- multiselect -->
                <input type="text" id="product-categories" class="categories">
                <label for="product-period">Historické obdobie</label>
                <input type="text" id="product-period" class="period">
                <label for="product-kind">Druh nábytku</label>
                <input type="text" id="product-kind" class="kind">
                <label for="product-material">Materiál</label>
                <input type="text" id="product-material" class="material">
                <label for="product-country-origin">Krajina</label>
                <input type="text" id="product-country-origin" class="country-origin">
                <label for="product-year">Rok výroby</label>
                <input type="text" id="product-year" class="year">
                <label for="color">Farba</label>
                <input type="text" id="product-color" class="color">
            </fieldset>
            <fieldset id="product-dimensions">
                <label for="product-width">Šírka</label>
                <input type="number" id="product-width" class="width">
                cm
                <label for="product-depth">Hĺbka</label>
                <input type="number" id="product-depth" class="depth">
                cm
                <label for="product-height">Výška</label>
                <input type="number" id="product-height" class="height">
                cm
            </fieldset>
        </form>
    </main>
    <footer>
        <p>Gaža &amp; Hájek &copy; 2021</p>
    </footer>
</body>
</html>