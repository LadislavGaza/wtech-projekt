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
            @foreach ($items as $item)
            <tr>
                <td><img src="{{ asset('images/'. ($item->picture ?? 'placeholder.jpg')) }}" width="150"></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->price }} €</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->product->price * $item->quantity }} €</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="summary-options">
        <section id="order-summary-transport">
            <h2>Doprava</h2>
            <img class="icon" src="{{ asset('icons/'. $transport->icon) }}">
            <p>{{ $transport->name }}</p>
            <p>{{ $transport->price }} €</p>
            <p>{{ $delivery_place->name }}</p>
        </section>
        <section id="order-summary-payment">
            <h2>Platba</h2>
            <img class="icon" src="{{ asset('icons/'. $payment->icon) }}">
            <p>{{ $payment->name }}</p>
            <p>{{ $payment->price }} €</p>
        </section>
        <table id="order-summary-price" class="cart-price-content">
            <tr>
                <th><emph>Celková suma:</emph><th>
                <td><emph>{{ $final_sum }} €</emph></td>
            </tr>
            <tr>
                <th>Bez DPH:<th>
                <td>{{ $final_sum * 0.8 }} €</td>
            </tr>
        </table>
        <a href="{{ url('order') }}" id="order-btn-back"  class="payment-button payment-back">Späť k objednávke</a>
        <form id="order-summary-confirm" action="{{ url('finish-order') }}" method="post">
            @csrf
            <input id="sales-terms-confirm" type="checkbox" name="terms-of-service">
            <label for="sales-terms-confirm">Súhlasím s obchodnými podmienkami *</label>
            <input id="personal-data-confirm" type="checkbox" name="personal-data">
            <label for="personal-data-confirm">Súhlasím so spracovaním osobných údajov *</label>
            <button id="order-btn-finish" class="payment-button" type="submit">Dokončiť nákup *</button>
            <p class="mandatory-payment">*s povinnosťou platby</p>
        </form> 
    </div>
</main>
@endsection