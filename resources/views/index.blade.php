@extends('layouts.main', ['title' => 'E-Shop'])

@push('styles')
<link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">
@endpush
 
@section('content')
<main>
    <img class="banner" src="{{ asset('images/banner.jpg') }}" alt="Posteľ v kráľovskej spáľni">
    <div class="featured">
        <div class="discounts">
            <img src="{{ asset('images/sofa-discount.jpg') }}" alt="Zľava 30%" class="placeholder-discount">
            <img src="{{ asset('images/discount-week.jpg') }}" alt="Zľava na pohovky" class="placeholder-discount">
        </div>
        <div class="promises">
            <h1 class="promises-heading">Prečo Antiquea</h1>
            <div class="shield">
                <p>Rýchle dodanie</p>
                <img class="icon-large" src="{{ asset('icons/wagon.svg') }}">
            </div>
            <div class="shield">
                <p>Dobové prevedenie</p>
                <img class="icon-large" src="{{ asset('icons/pillar.svg') }}">
            </div>
            <div class="shield">
                <p>Zaručená kvalita</p>
                <img class="icon-large" src="{{ asset('icons/badge.svg') }}">
            </div>
            <div class="shield">
                <p>Expresný servis</p>
                <img class="icon-large" src="{{ asset('icons/book.svg') }}">
            </div>
        </div>
    </div>
</main>
@endsection