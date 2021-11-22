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
            @foreach ($items as $item)
            <tr>
                <td><img class="product-image" src="{{ asset('images/'. $item->picture) }}"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }} €</td>
                <td><input type="number" value="$item->quantity"></td>
                <td>$item->price * $item->quantity €</td>
                <td>
                    <form id="form-add-to-cart" action="{{ url('cart', [$item->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" id="add-to-cart" class="button-to-cart">
                            <img class="icon-clickable" src="{{ asset('icons/x-lg.svg') }}">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
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