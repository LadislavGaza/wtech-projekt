@extends('layouts.main', ['title' => 'Objednávka'])

@push('styles')
<link href="{{ asset('css/order.css') }}" rel="stylesheet">
<script src="{{ asset('js/order.js') }}" type="text/javascript"></script>
@endpush
 
@section('content')
<main class="order-page">
    <h1>Váš nákup</h1>
    <form id="order-form" class="tabs" action="{{ url('order') }}" method="post">
        @csrf
        <fieldset class="tab">
            <input id="order-transport" type="checkbox" class="tab-checked" checked>
            <label for="order-transport" class="tab-label">
                <emph>Krok 1/<sub>3</sub></emph> 
                Doprava
            </label>
            <div class="tab-content transport-form">
                @foreach ($transport_options as $transport)
                    <input type="radio" id="{{ $transport->key }}" name="{{ $transport->type }}" 
                           value="{{ $transport->key }}" 
                           {{ ($options->transport == null && $loop->index == 0) || ($options->transport->id ?? '' == $transport->id) ? 'checked' : ''}}>
                    <img class="icon" src="{{ asset('icons/'. $transport->icon ) }}">
                    <label for="{{ $transport->key }}">{{ $transport->name }}</label>
                    <label for="{{ $transport->key }}">{{ $transport->price }} €</label>
                @endforeach
                <div class="search-bar">
                    <img src="{{ asset('icons/search.svg') }}" class="icon">
                    <input type="text" id="search" onInput="outpostSearch(this)"
                           placeholder="Sem napíšte výdajné miesto alebo prepravcu ...">
                </div>
                <div id="outpost" class="outpost">
                </div>
                <p class="selected-outpost">
                    <b>Výdajné miesto:</b>
                    <span id="outpost-active">-</span>
                </p>
                <a href="#order-payment" class="btn order-button payment" onclick="toPayment()">Platba</a>
            </div>
        </fieldset>
        <fieldset class="tab">
            <input id="order-payment" type="checkbox" class="tab-checked">
            <label for="order-payment" class="tab-label">
                <emph>Krok 2/<sub>3</sub></emph> 
                Platba
            </label>
            <div class="tab-content payment-form">
                @foreach ($payment_options as $payment)
                <input type="radio" id="{{ $payment->key }}" name="{{ $payment->type }}" 
                       value="{{ $payment->key }}"
                       {{ ($options->payment == null && $loop->index == 0) || ($options->payment->id ?? '' == $payment->id) ? 'checked' : ''}}>
                <img class="icon" src="{{ asset('icons/'. $payment->icon) }}">
                <label for="{{ $payment->key }}">{{ $payment->name }}</label>
                <label for="{{ $payment->key }}">{{ $payment->price }} €</label>
                @endforeach
                <a href="#order-address" class="btn order-button next-step" onclick="toAddress()">Dodanie a fakturácia</a>
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
                    <input type="radio" name="org" value="person" onchange="companyInfo(false)" 
                            {{ (!isset($user->is_company)) || (($user->is_company ?? '') == false) ? 'checked': '' }} >
                    <label>Súkromná osoba</label>
                    <input type="radio" name="org" value="company" onchange="companyInfo(true)" 
                            {{ (($user->is_company ?? '') == true) ? 'checked' : '' }}>
                    <label>Firma</label>
                </div>
                <div id="order-company-detail">
                    <label for="company">Spoločnosť</label>
                    <input type="text" id="company" name="company" value="{{ $user->company_name ?? ''}}">
                    @if ($errors->has('company'))
                    <div class="input-error">
                        {{ $errors->first('company') }}
                    </div>
                    @endif
                    <label for="ico">IČO</label>
                    <input type="text" id="ico" name="ico" value="{{ $user->ico ?? ''}}">
                    @if ($errors->has('ico'))
                    <div class="input-error">
                        {{ $errors->first('ico') }}
                    </div>
                    @endif
                    <label for="dic">DIČ</label>
                    <input type="text" id="dic" name="dic" value="{{ $user->dic ?? ''}}">
                    @if ($errors->has('dic'))
                    <div class="input-error">
                        {{ $errors->first('dic') }}
                    </div>
                    @endif
                    <label for="ic-dph">IČ DPH</label>
                    <input type="text" id="ic_dph" name="ic_dph" value="{{ $user->ic_dph ?? ''}}">
                    @if ($errors->has('ic_dph'))
                    <div class="input-error">
                        {{ $errors->first('ic_dph') }}
                    </div>
                    @endif
                </div>
                <div id="order-personal-detail">
                    <label for="firstname">Meno *</label>
                    <input type="text" id="firstname" name="firstname" value="{{ $user->firstname ?? ''}}">
                    @if ($errors->has('firstname'))
                    <div class="input-error">
                        {{ $errors->first('firstname') }}
                    </div>
                    @endif
                    <label for="surname">Priezvisko *</label>
                    <input type="text" id="surname" name="surname" value="{{ $user->surname ?? ''}}">
                    @if ($errors->has('surname'))
                    <div class="input-error">
                        {{ $errors->first('surname') }}
                    </div>
                    @endif
                    <label for="street">Ulica a číslo domu *</label>
                    <input type="text" id="street" name="street" value="{{ $user->street ?? ''}}">
                    @if ($errors->has('street'))
                    <div class="input-error">
                        {{ $errors->first('street') }}
                    </div>
                    @endif
                    <label for="city">Mesto *</label>
                    <input type="text" id="city" name="city" value="{{ $user->city ?? ''}}">
                    @if ($errors->has('city'))
                    <div class="input-error">
                        {{ $errors->first('city') }}
                    </div>
                    @endif
                    <label for="postal_code">PSČ *</label>
                    <input type="text" id="postal_code" name="postal_code" value="{{ $user->postal_code ?? ''}}">
                    @if ($errors->has('postal_code'))
                    <div class="input-error">
                        {{ $errors->first('postal_code') }}
                    </div>
                    @endif
                    <label for="phone">Telefónne číslo *</label>
                    <input type="text" id="phone" name="phone" value="{{ $user->phone ?? ''}}">
                    @if ($errors->has('phone'))
                    <div class="input-error">
                        {{ $errors->first('phone') }}
                    </div>
                    @endif
                </div>
            </div>
        </fieldset>
        <div class="align-right">
            <button class="payment-button" type="submit">Na prehľad</button>
        </div>
    </form>
</main>
@if (isset($user->is_company))
<script>
    companyInfo({{ $user->is_company ? 'true': 'false'}});
</script>
@endif
@endsection