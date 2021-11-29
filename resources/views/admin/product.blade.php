@extends('admin.main')

@push('styles')
<link href="{{ asset('css/admin-product.css') }}" rel="stylesheet">
@endpush
 
@section('content')
<main id="product-edit">
    <form id="upload-image" action="{{ url('admin/stock', [$product]) }}">
        @csrf
        @method('put')
        <img src="{{ asset('images/' . $product->picture) }}" width="300">
        <input type="file" class=login-user>
            <img class="icon" src="{{ asset('icons/card-image.svg') }}">
            Nahrať obrázok
        </button>
    </div>
    <form id="product-edit-form" action="{{ url('admin/stock') }}" method="post">
        @csrf
        <h1>Produkt</h1>
        <a href="{{ asset('search/', [$product]) }}" class="admin-product-button">
            <img class="icon" src="{{ asset('icons/box-arrow.svg') }}">
            Zobraziť
        </a>
        <button type="submit" class="admin-product-button">
            <img class="icon" src="{{ asset('icons/save.svg') }}">
            Uložiť
        </button>
        <fieldset id="product-basic-info">
            <label for="product-name">Názov</label>
            <input type="text" id="product-name" class="name" value="{{ $product->name }}">
            <label for="product-desc">Popis</label>
            <textarea id="product-desc" class="desc">{{ $product->description }}"</textarea>      
        </fieldset>
        <fieldset id="product-availability">
            <label for="product-in-portfolio">V ponuke</label>
            <input type="checkbox" id="product-in-portfolio" 
                   class="in-portfolio" {{ $product->in_offering ? 'checked' : ''}}>
            <label for="product-price">Cena</label>
            <input type="number" id="product-price" class="price" value="{{ $product->price }}">
            <label for="product-discount">Zľava</label>
            <input type="number" id="product-discount" class="discount" value="{{ $product->discount }}">
            <label for="product-stock">Na sklade</label>
            <input type="number" id="product-stock" class="stock" value="{{ $product->quantity }}">
        </fieldset>
        <fieldset id="product-attributes">
            <h2>Parametre</h2>
            <label for="product-categories">Kategórie</label>
            <input type="text" id="product-categories" class="categories">
            <label for="product-period">Historické obdobie</label>
            <input type="text" id="product-period" class="period">
            <label for="product-kind">Druh nábytku</label>
            <input type="text" id="product-kind" class="kind">
            <label for="product-material">Materiál</label>
            <input type="text" id="product-material" class="material">
            <label for="product-country-origin">Krajina</label>
            <input type="text" id="product-country-origin" class="country-origin">
            <label for="product-year">Rok výroby</label>
            <input type="text" id="product-year" class="year">
            <label for="color">Farba</label>
            <input type="text" id="product-color" class="color">
        </fieldset>
        <fieldset id="product-dimensions">
            <label for="product-width">Šírka</label>
            <input type="number" id="width" class="width" value="{{ $product->width }}"> cm
            <label for="product-depth">Hĺbka</label>
            <input type="number" id="depth" class="depth" value="{{ $product->depth }}"> cm
            <label for="product-height">Výška</label>
            <input type="number" id="height"  value="{{ $product->height }}"> cm
        </fieldset>
    </form>
</main>
@endsection
