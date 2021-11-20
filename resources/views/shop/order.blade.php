@extends('layouts.main', ['title' => 'Objednávka'])

@push('styles')
<link href="{{ asset('css/order.css') }}" rel="stylesheet">
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
@endpush
 
@section('content')
<main class="order-page">
    <h1>Váš nákup</h1>
    <form id="order-form" class="tabs" action="/order.php" method="post">
        <fieldset class="tab">
            <input id="order-transport" type="checkbox" class="tab-checked" checked>
            <label for="order-transport" class="tab-label">
                <emph>Krok 1/<sub>3</sub></emph> 
                Doprava
            </label>
            <div class="tab-content transport-form">
                <input type="radio" id="place" name="transport">
                <img class="icon" src="{{ asset('icons/box.svg') }}">
                <label for="place">Výdajné miesto</label>
                <label for="place">1 €</label>
                <input type="radio" id="delivery" name="transport">
                <img class="icon" src="{{ asset('icons/truck.svg') }}">
                <label for="delivery">Kuriér</label>
                <label for="delivery">0 €</label>
                <div class="search-bar">
                    <img src="{{ asset('icons/search.svg') }}" class="icon">
                    <input type="text" id="search" placeholder="Sem napíšte výdajné miesto alebo prepravcu ...">
                </div>
                <table class="outpost">
                    <tr>
                        <td>Bratislava - Cheese tower</td>
                        <td>
                            <div class="outpost-chooser">
                                <input type="radio" id="outpost-selection1" name="selection">
                                <label for="outpost-selection1">Zvoliť</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Telgárt - veľkosklad</td>
                        <td>
                            <div class="outpost-chooser">
                                <input type="radio" id="outpost-selection2" name="selection" checked>
                                <label for="outpost-selection2">Vybrané</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Moldava nad Bodvou - papiernictvo</td>
                        <td>
                            <div class="outpost-chooser">
                                <input type="radio" id="outpost-selection3" name="selection">
                                <label for="outpost-selection3">Zvoliť</label>
                            <div>
                        </td>
                    </tr>
                    <tr>
                        <td>Brezová pod Bradlom - chovateľské potreby</td>
                        <td>
                            <div class="outpost-chooser">
                                <input type="radio" id="outpost-selection4" name="selection">
                                <label for="outpost-selection4">Zvoliť</label>
                            <div>
                        </td>
                    </tr>
                </table>
                <p class="selected-outpost"><b>Výdajné miesto:</b> Telgárt - veľkosklad</p>
                <a href="#" class="btn order-button payment">Platba</a>
            </div>
        </fieldset>
        <fieldset class="tab">
            <input id="order-payment" type="checkbox" class="tab-checked">
            <label for="order-payment" class="tab-label">
                <emph>Krok 2/<sub>3</sub></emph> 
                Platba
            </label>
            <div class="tab-content payment-form">
                <input type="radio" id="dobierka" name="payment">
                <img class="icon" src="{{ asset('icons/cash-coin.svg') }}">
                <label for="dobierka">Dobierka</label>
                <label for="dobierka">1 €</label>
                <input type="radio" id="card" name="payment">
                <img class="icon" src="{{ asset('icons/credit-card.svg') }}">
                <label for="card">Kartou vopred</label>
                <label for="card">0 €</label>
                <a class="btn order-button next-step" href="#">Dodanie a fakturácia</a>
            </div>
        </fieldset>
        <fieldset class="tab">
            <input id="order-address" type="checkbox" class="tab-checked">
            <label for="order-address" class="tab-label">
                <emph>Krok 3/<sub>3</sub></emph> 
                Dodacia a fakturačná adresa
            </label>
            <div class="tab-content">
                <div id="order-subject-type">
                    <input type="radio" name="org">
                    <label>Súkromná osoba</label>
                    <input type="radio" name="org">
                    <label>Firma</label>
                </div>
                <div id="order-company-detail">
                    <label for="company">Spoločnosť</label>
                    <input type="text" id="company" name="company">
                    <label for="ico">IČO</label>
                    <input type="text" id="ico" name="ico">
                    <label for="dic">DIČ</label>
                    <input type="text" id="dic" name="dic">
                    <label for="ic-dph">IČ DPH</label>
                    <input type="text" id="ic-dph" name="ic-dph">
                </div>
                <div id="order-personal-detail">
                    <label for="name">Meno</label>
                    <input type="text" id="name" name="name">
                    <label for="surname">Priezvisko</label>
                    <input type="text" id="surname" name="surname">
                    <label for="street">Ulica a číslo domu</label>
                    <input type="text" id="street" name="street">
                    <label for="city">Mesto</label>
                    <input type="text" id="city" name="city">
                    <label for="psc">PSČ</label>
                    <input type="text" id="psc" name="psc">
                    <label for="phone">Telefónne číslo</label>
                    <input type="text" id="phone" name="phone">
                </div>
            </div>
        </fieldset>
        <div class="align-right">
            <button class="payment-button" type="submit">Na prehľad</button>
        </div>
    </form>
    <section id="order-summary" class="divider">
        <article class="product">
            <img class="product-image" src="{{ asset('images/sofa.jpg') }}">
            <label class=product-caption>Bauhaus Chrome</label>
            <label class="product-price">1400 €</label>
        </article>
        <article class="product">
            <img class="product-image" src="{{ asset('images/sofa.jpg') }}">
            <label class=product-caption>Bauhaus Chrome</label>
            <label class="product-price">1400 €</label>
        </article>
        <article class="product">
            <img class="product-image" src="{{ asset('images/sofa.jpg') }}">
            <label class=product-caption>Bauhaus Chrome</label>
            <label class="product-price">1400 €</label>
        </article>
        <table class="cart-price-content">
            <tr>
                <th>Celková suma:<th>
                <td>3305&nbsp;€</td>
            </tr>
            <tr>
                <th>Bez DPH:<th>
                <td>2644&nbsp;€</td>
            </tr>
        </table>
    </section>
</main>
@endsection