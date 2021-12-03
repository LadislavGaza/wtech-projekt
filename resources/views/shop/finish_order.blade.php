@extends('layouts.main', ['title' => 'Objednávka úspešná'])

@push('styles')
<link href="{{ asset('css/order.css') }}" rel="stylesheet">
@endpush

@section('content')
<main class="center">
    <div class="order-success-dialog content-middle">
        <h1>Objednávka úspešne odoslaná</h1>
        <a href="{{ url('search') }}" class="btn button-success">Pokračovať v nakupovaní</a>
    </div>
</main>
@endsection