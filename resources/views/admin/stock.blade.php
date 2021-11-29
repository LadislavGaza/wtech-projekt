@extends('admin.main')

@push('styles')
<link href="{{ asset('css/admin-stock.css') }}" rel="stylesheet">
@endpush
 
@section('content')
<main id="product-stock">
    <a href="{{ url('admin') }}" class="btn" id="new-product">
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
            @foreach ($products as $product)
            <tr>
                <td><img class="product-image" src="{{ asset('images/'. $product->picture) }}"></td>
                <td><a href="{{ url('admin/stock', [$product]) }}">{{ $product->name }}</a></td>
                <td><img class="icon" src="{{ asset('icons/eye.svg') }}"></td> <!-- icons/eye-slash.svg -->
                <td>{{ $product->quantity }} ks</td>
                <td>{{ $product->price }} €</td>
                <td>
                    <a href="{{ url('search', [$product]) }}">
                        <img class="icon" src="{{ asset('icons/box-arrow.svg') }}">
                    </a>
                    <img class="icon" src="{{ asset('icons/x-lg.svg') }}">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('layouts.partials.pagination')
</main>
@endsection
