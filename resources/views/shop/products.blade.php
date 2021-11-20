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
    <form id="product-sort" action="/sort.php" action="post">
        <fieldset>
            <legend>Usporiadanie</legend>
            <div class="select-wrapper">
                <select>
                    <option value="cheap">Od najlacnejších</option>
                    <option value="expensive">Od najdrahších</option>
                    <option value="discount">Od najväčšej zľavy</option>
                    <option value="newest">Najnovšie</option>
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
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/sofa.jpg') }}" alt="Kreslo v štýle art deco">
                <p class="product-caption">Kreslo v štýle art deco s červeným čalúnením</p>
                <p class="product-price">350 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/couch.jpg') }}">
                <p class="product-caption">Holandský barokový kabinet</p>
                <p class="product-price">1120 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/sofa.jpg') }}">
                <p class="product-caption">Pohovka zo zelenej kože  z 1970</p>
                <p class="product-price">525 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/couch.jpg') }}">
                <p class="product-caption">Pohovka Bauhaus Chrome</p>
                <p class="product-price">720 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/sofa.jpg') }}">
                <p class="product-caption">Maľované bambusové kreslo</p>
                <p class="product-price">499 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/sofa.jpg') }}">
                <p class="product-caption">Gauč alebo rozkladacia pohovka z 1960</p>
                <p class="product-price">380 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/couch.jpg') }}">
                <p class="product-caption">Benátsky rokokový konferenčný stolík</p>
                <p class="product-price">2200 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/sofa.jpg') }}">
                <p class="product-caption">Mahagonový kartový stolík z pozláteného bronzu</p>
                <p class="product-price">5200 €</p>
            </a>
        </article>
        <article class="product">
            <a href="furniture.html">
                <img class="product-image" src="{{ asset('images/couch.jpg') }}">
                <p class="product-caption">Medený kávový stolík</p>
                <p class="product-price">1800 €</p>
            </a>
        </article>
    </section>
    </div>
    <nav id="product-pager" class="pagination">
        <ul>
            <li><a href="#">&lt;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&gt;</a></li>
        </ul>
    </nav>
</main>
@endsection