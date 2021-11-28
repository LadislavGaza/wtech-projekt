@extends('layouts.main', ['title' => 'Produkt'])

@push('styles')
<link href="{{ asset('css/furniture.css') }}" rel="stylesheet">
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
@endpush
 
@section('content')
<main class="furniture-page">
    <ul class="breadcrumb">
        <li><a href="#">Obývačka</a></li>
        <li><a href="#">{{ $product->name }}</a></li>
    </ul>
    <img id="furniture-image" src="{{ asset('images/'. $product->picture) }}" alt="{{ $product->name }}">
    <h1 id="furniture-name">{{ $product->name }}</h1>
    <p id="furniture-description">{{ $product->description }}
    </p>
    <p id="furniture-stock-amount">Na sklade {{ $product->quantity }} ks</p>
    <p id="furniture-price">
        <emph>{{ $product->price }} €</emph> {{ $product->price * 0.8 }} € bez DPH
    </p>
    <form id="form-add-to-cart" action="{{ url('cart') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $product->id }}" name="product-id">
        <button type="submit" id="add-to-cart" class="button-to-cart">
            <img class="icon" id="cart-add-icon" src="{{ asset('icons/wagon.svg') }}">
            Do košíka
        </button>
    </form>
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
                <td>{{ $product->year }}</td>
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
                <td>{{ $product->width }} cm</td>
            </tr>
            <tr>
                <th>Hĺbka:</th>
                <td>{{ $product->depth }} cm</td>
            </tr>
            <tr>
                <th>Výška:</th>
                <td>{{ $product->height }} cm</td>
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