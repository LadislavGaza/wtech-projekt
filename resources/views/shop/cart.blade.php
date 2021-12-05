@extends('layouts.main', ['title' => 'Nákupný košík'])

@push('styles')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
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
                <td><img class="product-image" src="{{ asset('images/'. ($item->product->picture ?? 'placeholder.jpg') }}"></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->price }} €</td>
                <td><form action="{{ url('cart', [$item->product->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="number" name="howMuch" value="{{ $item->quantity }}" onChange="changeQuantity()">
                    </form>
                </td>
                <td> {{ $item->product->price * $item->quantity }}€</td>
                <td>
                    <form action="{{ url('cart', [$item->product->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="button-to-delete">
                            <img class="icon-clickable" src="{{ asset('icons/x-lg.svg') }}">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if (sizeof($items) == 0)
                <tr><td colspan="8" class="cart-empty">V košíku nemáte žiadny nábytok</td></tr>
            @endif
        </tbody>
    </table>
    <div class="cart-price content-middle">
        <table class="cart-price-content">
            <tr>
                <th><emph>Celková suma:</emph><th>
                <td><emph>{{ $final_sum }}&nbsp;€</emph></td>
            </tr>
            <tr>
                <th>Bez DPH:<th>
                <td>{{ $final_sum * 0.8 }}&nbsp;€</td>
            </tr>
        </table>
        <a href="{{ url('order') }}" class="button payment-button">K pokladni</a>
        @if($errors->any())
            <p class="input-error cart-error">{{ $errors->first() }}<p>
        @endif
    </div>
</main>
@endsection