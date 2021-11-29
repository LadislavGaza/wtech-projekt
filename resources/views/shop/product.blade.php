@extends('layouts.main', ['title' => 'Produkt'])

@push('styles')
<link href="{{ asset('css/furniture.css') }}" rel="stylesheet">
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
@endpush
 
@section('content')
<main class="furniture-page">
    <ul class="breadcrumb">
        @if ($room != 'search')
        <li><a href="{{ url('products/'. $room->key) }}">{{ $room->name }}</a></li>
        @endif
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
        @if (session('status'))
        <button type="submit" id="in-cart" class="add-to-cart button-to-cart">
            <img class="icon" id="cart-add-icon" src="{{ asset('icons/check.svg') }}">Pridané do košíka
        </button>
        @else
        <button type="submit" class="add-to-cart button-to-cart">
            <img class="icon" id="cart-add-icon" src="{{ asset('icons/wagon.svg') }}">Do košíka
        </button>
        @endif
    </form>
    <section id="furniture-parameters">
        <h2>Parametre</h2>
        <table>
            <tr>
                <th>Historické obdobie:</th>
                <td>{{ $product->periods_str() }}</td>
            </tr>
            <tr>
                <th>Druh nábytku:</th>
                <td>{{ $product->furniture_str() }}</td>
            </tr>
            <tr>
                <th>Rok výroby:</th>
                <td>{{ $product->year }}</td>
            </tr>
            <tr>
                <th>Materiál:</th>
                <td>{{ $product->materials_str() }}</td>
            </tr>
            <tr>
                <th>Farba:</th>
                <td>{{ $product->colors_str() }}</td>
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
        @foreach ($recommendations as $product)
        <article class="product">
            @if ($room == 'search')
            <a href="{{ url('search', [$product]) }}">
            @else
            <a href="{{ url('products/'. $room->key, [$product]) }}">
            @endif
                <img class="product-image" src="{{ asset('images/' . $product->picture) }}" alt="{{ $product->name }}">
                <p class="product-caption">{{ $product->name }}</p>
                <p class="product-price">{{ $product->price }} €</p>
            </a>
        </article>
        @endforeach
    </section>
</main>
@endsection