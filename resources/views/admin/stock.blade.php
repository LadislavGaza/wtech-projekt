@extends('admin.main')

@push('styles')
<link href="{{ asset('css/admin-stock.css') }}" rel="stylesheet">
@endpush
 
@section('content')
<main id="product-stock">
    <a href="{{ url('admin/stock/create') }}" class="btn" id="new-product">
        <img src="{{ asset('icons/plus-lg.svg') }}" class="icon">
        Nový produkt
    </a>
    <table id="admin-product-stock">
        <thead>
            <th></th>
            <th>Produkt</th>
            <th>Na sklade</th>
            <th>Cena</th>
            <th>Akcie</th>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="tr-stock-actions">
                <td><img class="product-image" src="{{ asset('images/'. $product->picture) }}"></td>
                <td><a href="{{ url('admin/stock/'. $product->id . '/edit') }}">{{ $product->name }}</a></td>
                <td>{{ $product->quantity }} ks</td>
                <td>{{ $product->price }} €</td>
                <td>
                    <div class="stock-actions">
                        <a href="{{ url('search', [$product]) }}">
                            <img class="icon" src="{{ asset('icons/box-arrow.svg') }}">
                        </a>
                        <form action="{{ url('admin/stock', [$product->id]) }}"
                            method="post" onsubmit="return confirm('Naozaj chcete zmazať produkt z ponuky?');">
                            @csrf
                            @method('delete')
                            <button type="submit" class="button-to-delete">
                                <img class="icon-clickable" src="{{ asset('icons/x-lg.svg') }}">
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('layouts.partials.pagination')
</main>
@endsection
