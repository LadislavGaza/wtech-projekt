@extends('layouts.main', ['title' => 'Zhrnutie'])

@push('styles')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
@endpush
 
@section('content')
<main>
    <h1 class="content-middle">Zhrnutie objednávky</h1>
    <table class="cart-contents content-middle divider-bottom">
        <thead>
            <th></th>
            <th>Názov produktu</th>
            <th>Cena za kus</th>
            <th>Množstvo</th>
            <th>Medzisúčet</th>
        </thead>
        <tbody>
            <tr>
                <td><img src="{{ asset('images/couch.jpg') }}" width="150"></td>
                <td>Pohovka Bauhaus Chrome</td>
                <td>720 €</td>
                <td>2</td>
                <td>1440 €</td>
            </tr>
            <tr>
                <td><img src="{{ asset('images/couch.jpg') }}" width="150"></td>
                <td>Drevený rošt Jakub</td>
                <td>65 €</td>
                <td>1</td>
                <td>65 €</td>
            </tr>
            <tr>
                <td><img src="{{ asset('images/couch.jpg') }}" width="150"></td>
                <td>Medený kávový stolík</td>
                <td>1800 €</td>
                <td>1</td>
                <td>1800 €</td>
            </tr>
        </tbody>
    </table>
    <div class="summary-options">
        <section id="order-summary-transport">
            <h2>Doprava</h2>
            <img class="icon" src="{{ asset('icons/box.svg') }}">
            <p>Výdajné miesto</p>
            <p>5 €</p>
            <p>Telgárt - veľkosklad</p>
        </section>
        <section id="order-summary-payment">
            <h2>Platba</h2>
            <img class="icon" src="{{ asset('icons/credit-card.svg') }}">
            <p>Kartou vopred</p>
            <p>0 €</p>
        </section>
        <table id="order-summary-price" class="cart-price-content">
            <tr>
                <th><emph>Celková suma:</emph><th>
                <td><emph>3305 €</emph></td>
            </tr>
            <tr>
                <th>Bez DPH:<th>
                <td>2644 €</td>
            </tr>
        </table>
        <div id="order-summary-confirm">
            <input id="sales-terms-confirm" type="checkbox">
            <label for="sales-terms-confirm">Súhlasím s obchodnými podmienkami</label>
            <input id="personal-data-confirm" type="checkbox">
            <label for="personal-data-confirm">Súhlasím so spracovaním osobných údajov</label>
        </div>
        <button id="order-btn-back"  class="payment-button payment-back">Späť k objednávke</button> 
        <button id="order-btn-finish" class="order-move payment-button">Dokončiť nákup</button>
        <p class="mandatory-payment">*s povinnosťou platby</p>
    </div>
</main>
@endsection