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
                <div class="outpost">
                    <table>
                        @if($places->isNotEmpty())
                        @foreach ($places as $place)
                            <tr>
                                <td>
                                    {{ $place->name }}
                                </td>
                                <td class="table-data-chooser">
                                    <div class="outpost-chooser">
                                        <input type="radio" id="{{ $place->id }}-selection" name="selection">
                                        <label for="{{ $place->id }}-selection">Zvoliť</label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <p>No items (places)</p>
                        @endif
                    </table>
                </div>
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
</main>
@endsection