@extends('layouts.main', ['title' => 'Nákupný košík'])

@push('styles')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
@endpush
 
@section('content')
<main>
    <h1 class="content-middle">Váš nákup</h1>
    <table class="cart-contents content-middle">
        <thead>
            <th></th>
            <th>Názov produktu</th>
            <th>Cena za kus</th>
            <th>Množstvo</th>
            <th>Medzisúčet</th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td><img class="product-image" src="{{ asset('images/couch.jpg') }}"></td>
                <td>Pohovka Bauhaus Chrome</td>
                <td>720 €</td>
                <td><input type="number" value="2"></td>
                <td>1440 €</td>
                <td><img class="icon-clickable" src="{{ asset('icons/x-lg.svg') }}"></td>
            </tr>
            <tr>
                <td><img class="product-image" src="{{ asset('images/couch.jpg') }}"></td>
                <td>Drevený rošt Jakub</td>
                <td>65 €</td>
                <td><input type="number" value="1"></td>
                <td>65 €</td>
                <td><img class="icon-clickable" src="{{ asset('icons/x-lg.svg') }}"></td>
            </tr>
            <tr>
                <td><img class="product-image" src="{{ asset('images/couch.jpg') }}"></td>
                <td>Medený kávový stolík</td>
                <td>1800 €</td>
                <td><input type="number" value="1"></td>
                <td>1800 €</td>
                <td><img class="icon-clickable" src="{{ asset('icons/x-lg.svg') }}"></td>
            </tr>
        </tbody>
    </table>
    <div class="cart-price content-middle">
        <table class="cart-price-content">
            <tr>
                <th><emph>Celková suma:</emph><th>
                <td><emph>3305&nbsp;€</emph></td>
            </tr>
            <tr>
                <th>Bez DPH:<th>
                <td>2644&nbsp;€</td>
            </tr>
        </table>
        <a href="order.html" class="button payment-button">K pokladni</a>
    </div>
</main>
@endsection