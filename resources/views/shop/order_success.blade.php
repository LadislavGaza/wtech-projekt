@extends('layouts.main', ['title' => 'Objednávka úspešná'])
 
@section('content')
<main class="center">
    <div class="order-success-dialog content-middle">
        <h1>Objednávka úspešne odoslaná</h1>
        <a href="{{ url('search') }}" class="btn">Pokračovať v nakupovaní</a>
    </div>
</main>
@endsection