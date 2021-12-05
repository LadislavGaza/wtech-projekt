@extends('admin.main')

@push('styles')
<link href="{{ asset('css/admin-product.css') }}" rel="stylesheet">
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
@endpush
 
@section('content')
<main>
    <form action="{{ url('admin/stock/' . ($product->id ?? '')) }}" 
          enctype="multipart/form-data" id="product-edit" method="post">
        @csrf
        @if (isset($product))
            @method('put')
        @endif
        <div id="upload-image">
            <img id="product-image" src="{{ asset('images/' . ($product->picture ?? 'placeholder.jpg')) }}">
            <label class="btn product-image-button" >
                <input type="file" name='image' accept=".jpg, .jpeg, .png, .webp" onchange="previewImage()">
                <img class="icon" src="{{ asset('icons/card-image.svg') }}" >
                Nahrať obrázok
            </label>
            @if(isset($product->picture))
                <button type="submit" class="btn product-image-button btn-delete" name="remove-image">Zmazať obrázok</button>
            @endif
        </div>
        <div id="product-edit-form">
            <h1>Produkt</h1>
            @if (isset($product))
            <a href="{{ asset('search/' . $product->id) }}" class="admin-product-button" target="_blank">
                <img class="icon" src="{{ asset('icons/box-arrow.svg') }}">
                Zobraziť
            </a>
            @else
            <div></div>
            @endif
            <button type="submit" class="admin-product-button save-button">
                <img class="icon" src="{{ asset('icons/save.svg') }}">
                Uložiť
            </button>
            <fieldset id="product-basic-info">
                <label for="product-name">Názov</label>
                <input type="text" id="product-name" class="name" value="{{ $product->name ?? ''  }}" name="product_name">
                <label for="product-desc">Popis</label>
                <textarea id="product-desc" class="desc" name="product_description">{{ $product->description ?? '' }}</textarea>      
            </fieldset>
            <fieldset id="product-availability">
                <label for="product-price">Cena</label>
                <input type="number" id="product-price" class="price" value="{{ $product->price ?? '' }}" name="product_price">
                <label for="product-stock">Na sklade</label>
                <input type="number" id="product-stock" class="stock" value="{{ $product->quantity ?? '' }}" name="product_stock">
                <label for="product-year">Rok výroby</label>
                <input type="number" id="product-year" class="year" value="{{ $product->year ?? '' }}" name="product_year">
            </fieldset>
            <fieldset id="product-attributes">
                <h2>Kategórie</h2>
                @foreach($categories_names as $key => $title)
                <label>{{ $title }}</label>
                <div class="filter-categories">
                    @foreach($categories[$key] as $option)
                    <input type="checkbox" id="category-{{ $option->id }}"
                            name="{{ $option->key }}" {{ $categories_checked[$option->key] ?? '' }}>
                    <label for="category-{{ $option->id }}">{{ $option->name }}</label>
                    @endforeach        
                </div>
                @endforeach
            </fieldset>
            <fieldset id="product-dimensions">
                <label for="product-width">Šírka</label>
                <input type="number" id="product-width" value="{{ $product->width ?? '' }}" name="product_width"> cm
                <label for="product-depth">Hĺbka</label>
                <input type="number" id="product-depth" value="{{ $product->depth ?? '' }}" name="product_depth"> cm
                <label for="product-height">Výška</label>
                <input type="number" id="product-height" value="{{ $product->height ?? '' }}" name="product_height"> cm
            </fieldset>
        </div>
    </form>
</main>
@endsection
