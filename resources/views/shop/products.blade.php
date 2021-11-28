@extends('layouts.main', ['title' => 'Produkty'])

@push('styles')
<link href="{{ asset('css/products.css') }}" rel="stylesheet">
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
@endpush
 
@section('content')
<main class="product-page">
    <h1 id="product-category">{{ $room->name }}</h1>
    <form id="product-form-sort" action="{{ url('products') }}" method="get">
        @csrf
        <fieldset>
            <legend>Usporiadanie</legend>
            <div class="select-wrapper">
                <select id="product-sort" name="product-sort">
                    <option value="default" {{ $active_sort == 'default' ? 'selected' : '' }} disabled>Predvolené</option>
                    <option value="cheap" {{ $active_sort == 'cheap' ? 'selected' : '' }}>Od najlacnejších</option>
                    <option value="expensive" {{ $active_sort == 'expensive' ? 'selected' : '' }}>Od najdrahších</option>
                    <option value="discount" {{ $active_sort == 'discount' ? 'selected' : '' }}>Od najväčšej zľavy</option>
                    <option value="newest" {{ $active_sort == 'newest' ? 'selected' : '' }}>Najnovšie rokom výroby</option>
                </select>
            </div>
        </fieldset>
    </form>
    <aside id="product-filter">
        <form action="{{ url('products/'. $room->key) }}" method="get" class="tabs">
            @csrf
            <div class="filter-buttons">
                <button type="submit" class="big-button btn filter-button">Filtrovať</button>
                <button type="submit" class="big-button btn filter-button" name='cancel-filters'>Zrušiť výber</button>
            </div>
            <div class="tab">
                <input type="checkbox" id="price-accordion" class="tab-checked">
                <label class="tab-label" for="price-accordion">Cena</label>
                <div class="tab-content">
                    <div class="price-range">
                        <input type="text" class="price-constraint" name="price-from" value="{{ session()->get('price-from') }}"> € až 
                        <input type="text" class="price-constraint" name="price-to" value="{{ session()->get('price-to') }}"> €
                    </div>
                </div>
            </div>
            @foreach($filter_names as $key => $title)
            <div class="tab">
                <input type="checkbox" id="{{ $key }}-accordion" class="tab-checked">
                <label class="tab-label" for="{{ $key }}-accordion">{{ $title }}</label>
                <div class="tab-content">
                    @foreach($filters[$key] as $option)
                    <input type="checkbox" id="{{ $option->id }}" name="{{ $key }}-{{ $option->name }}">
                    <label for="{{ $option->id }}">{{ $option->name }}</label>
                    @endforeach        
                </div>
            </div>
            @endforeach
        </form>
    </aside>
    <section id="product-list">
        @foreach($products as $product)
        <article class="product">
            <a href="{{ url('products/'. $room->key, [$product]) }}">
                <img class="product-image" src="{{ asset('images/'. $product->picture) }}" alt="{{ $product->name }}">
                <p class="product-caption">{{ $product->name }}</p>
                <p class="product-price">{{ $product->price }} €</p>
            </a>
        </article>
        @endforeach
    </section>
    </div>
    <nav id="product-pager" class="pagination">
        <ul>
            @if ($products->onFirstPage())
            <li><a href="{{ $products->previousPageUrl() }}">&lt;</a></li>
            <li><a href="{{ $products->url($products->currentPage()) }}" class="current-page">{{ $products->currentPage() }}</a></li>
                @if ($products->hasMorePages())
                <li><a href="{{ $products->nextPageUrl() }}">{{ $products->currentPage() + 1 }}</a></li>
                @endif
            <li><a href="{{ $products->nextPageUrl() }}">&gt;</a></li>
            @else
            <li><a href="{{ $products->previousPageUrl() }}">&lt;</a></li>
            <li><a href="{{ $products->previousPageUrl() }}">{{ $products->currentPage() - 1 }}</a></li>
            <li><a href="{{ $products->url($products->currentPage()) }}" class="current-page">{{ $products->currentPage() }}</a></li>
                @if ($products->hasMorePages())
                <li><a href="{{ $products->nextPageUrl() }}">{{ $products->currentPage() + 1 }}</a></li>
                @endif
            <li><a href="{{ $products->nextPageUrl() }}">&gt;</a></li>
            @endif
        </ul>
    </nav>
</main>
@endsection