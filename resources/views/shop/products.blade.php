@extends('layouts.main', ['title' => 'Produkty'])

@push('styles')
<link href="{{ asset('css/products.css') }}" rel="stylesheet">
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
@endpush
 
@section('content')
<main class="product-page">
    <h1 id="product-category">Obývačka</h1>
    <p id="product-description">Obývačka je miestom kde spoločne posedí celá rodina, pozývame si do nej hostí, trávime v nej chvíľe pohodlia.
        Zvolený nábytok by mal preto vhodne vyzdvihovať ostatné zariadenie domácnosti a zároveň pôsobiť na pohľad
        príjemným dojmom. Ideálnou voľbou je zladiť štýl pohoviek, kresiel, stolíku a skriniek v dobovom tóne.
    </p>
    <form id="product-sort" action="{{ url('products') }}" method="get">
        <p>{{ request()->get('product-filter') }}</p>
        <fieldset>
            <legend>Usporiadanie</legend>
            <div class="select-wrapper">
                <select id="product-filter" name="product-filter">
                    <option value="cheap" {{ request()->get('product-filter') == 'cheap' ? 'selected':'' }}>Od najlacnejších</option>
                    <option value="expensive" {{ request()->get('product-filter') == 'expensive' ? 'selected':'' }}>Od najdrahších</option>
                    <option value="discount" {{ request()->get('product-filter') == 'discount' ? 'selected':'' }}>Od najväčšej zľavy</option>
                    <option value="newest" {{ request()->get('product-filter') == 'newest' ? 'selected':'' }}>Najnovšie</option>
                </select>
            </div>
        </fieldset>
    </form>
    <aside id="product-filter" class="tabs">
        <div class="tab">
            <input type="checkbox" id="price-accordion" class="tab-checked">
            <label class="tab-label" for="price-accordion">Cena</label>
            <div class="tab-content">
                <input type="range" min="0" max="2000" id="cena">
                <div class="price-range">
                    <input type="text" class="price-constraint"> € až <input type="text" class="price-constraint"> €
                </div>
            </div>
        </div>
        <div class="tab">
            <input type="checkbox" id="era-accordion" class="tab-checked">
            <label class="tab-label" for="era-accordion">Historické obdobie</label>
            <div class="tab-content">
                <input type="checkbox" id="stredovek">
                <label for="stredovek">Stredovek</label>
                <input type="checkbox" id="renesancia">
                <label for="renesancia">Renesancia</label>
                <input type="checkbox" id="rokoko">
                <label for="rokoko">Rokoko</label>
                <input type="checkbox" id="art-nouveau">
                <label for="art-nouveau">Art Nouveau</label>
                <input type="checkbox" id="bauhaus">
                <label for="bauhaus">Bauhaus</label>
                <input type="checkbox" id="art-deco">
                <label for="art-deco">Art Deco</label>
            </div>
        </div>
        <div class="tab">
            <input type="checkbox" id="material-accordion" class="tab-checked">
            <label class="tab-label" for="material-accordion">Materiál</label>
            <div class="tab-content">
                <input type="checkbox" id="drevo">
                <label for="drevo">Drevo</label>
                <input type="checkbox" id="koza">
                <label for="koza">Koža</label>
                <input type="checkbox" id="kov">
                <label for="kov">Kov</label>
                <input type="checkbox" id="plast">
                <label for="plast">Plast</label>
                <input type="checkbox" id="latka">
                <label for="latka">Látka</label>          
            </div>
        </div>
        <div class="tab">
            <input type="checkbox" id="furniture-accordion" class="tab-checked">
            <label class="tab-label" for="furniture-accordion">Druh nábytku</label>
            <div class="tab-content">
                <input type="checkbox" id="sedacky">
                <label for="sedacky">Sedačky</label>
                <input type="checkbox" id="pohovky">
                <label for="pohovky">Pohovky</label>
                <input type="checkbox" id="kresla">
                <label for="kresla">Kreslá</label>
                <input type="checkbox" id="lehatka">
                <label for="lehatka">Lehátka</label>
                <input type="checkbox" id="komody">
                <label for="komody">Komody</label>           
            </div>
        </div>
        <div class="tab">
            <input type="checkbox" id="color-accordion" class="tab-checked">
            <label class="tab-label" for="color-accordion">Farba</label>
            <div class="tab-content">
                <input type="checkbox" id="biela">
                <label for="biela">Biela</label>
                <input type="checkbox" id="cierna">
                <label for="cierna">Čierna</label>
                <input type="checkbox" id="hneda">
                <label for="hneda">Hnedá</label>           
            </div>
        </div>
    </aside>
    <section id="product-list">
        @foreach($products as $product)
        <article class="product">
            <a href="products/{{ $product->id }}">
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