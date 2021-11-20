@extends('layouts.main', ['title' => 'Registrácia'])

@push('styles')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
@endpush
 
@section('content')
<main class="center">
    <div class="login-page content-middle">
        <section class="registration-form">
            <h1>Registrácia</h1>
            <form action="/register.php" method="post">
                <p id="subtitle">Ste tu nový? Vyplňte formulár a uľahčite si u nás vaše nákupy </p>

                <label for="email">E-mail:</label>
                <input type="email" id="email">

                <label for="password">Heslo:</label>
                <input type="password" id="password">

                <label for="password-confirm">Zopakovať heslo:</label>
                <input type="password" id="password-confirm">

                <button type="submit" class="button-login big-button">Registrovať sa</button>
            </form>
        </section>
    </div>
</main>
@endsection