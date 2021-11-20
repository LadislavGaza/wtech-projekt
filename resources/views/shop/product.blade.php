@extends('layouts.main', ['title' => 'Produkt'])

@push('styles')
<link href="{{ asset('css/furniture.css') }}" rel="stylesheet">
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
@endpush
 
@section('content')
<main class="furniture-page">
    <ul class="breadcrumb">
        <li><a href="#">Obývačka</a></li>
        <li><a href="#">Pohovka Bauhaus Chrome</a></li>
    </ul>
    <img id="furniture-image" src="{{ asset('images/couch.jpg') }}" alt="Pohovka Bauhaus Chrome">
    <h1 id="furniture-name">Pohovka Bauhaus Chrome</h1>
    <p id="furniture-description">Kovová rúrková pohovka chrómového vzhľadu, rok 1930. Traduje sa,
        že bola nadizajnovaná samotným Klementom Gottwaldom. Kov je vo výbornom stave
    </p>
    <p id="furniture-stock-amount">Na sklade 4 ks</p>
    <p id="furniture-price">
        <emph>720 €</emph> 576 € bez DPH
    </p>
    <button id="add-to-cart" class="button-to-cart">
        <img class="icon" id="cart-add-icon" src="{{ asset('icons/wagon.svg') }}">
        Do košíka
    </button>
    <section id="furniture-parameters">
        <h2>Parametre</h2>
        <table>
            <tr>
                <th>Historické obdobie:</th>
                <td>Bauhaus</td>
            </tr>
            <tr>
                <th>Druh nábytku:</th>
                <td>Pohovka</td>
            </tr>
            <tr>
                <th>Rok výroby:</th>
                <td>1930</td>
            </tr>
            <tr>
                <th>Krajina pôvodu:</th>
                <td>Česká republika</td>
            </tr>
            <tr>
                <th>Materiál:</th>
                <td>Kov, Látka</td>
            </tr>
            <tr>
                <th>Farba:</th>
                <td>Strieborna, Šedá</td>
            </tr>
        </table>
    </section>
    <section id="furniture-size">
        <h2>Rozmery</h2>
        <table>
            <tr>
                <th>Šírka:</th>
                <td>191 cm</td>
            </tr>
            <tr>
                <th>Hĺbka:</th>
                <td>81 cm</td>
            </tr>
            <tr>
                <th>Výška:</th>
                <td>70 cm</td>
            </tr>
        </table>  
    </section>
    <section id="furniture-recommendation"> 
        <h2>Ďalej odporúčame</h2>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/couch.jpg') }}">
                <p class="product-caption">Holandský barokový kabinet</p>
                <p class="product-price">1120 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/sofa.jpg') }}">
                <p class="product-caption">Pohovka zo zelenej kože  z 1970</p>
                <p class="product-price">525 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/couch.jpg') }}">
                <p class="product-caption">Pohovka Bauhaus Chrome</p>
                <p class="product-price">720 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/sofa.jpg') }}">
                <p class="product-caption">Maľované bambusové kreslo</p>
                <p class="product-price">499 €</p>
            </a>
        </article>
    </section>
</main>
@endsection