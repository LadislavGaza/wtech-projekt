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
             <!-- Validation Errors -->
            <x-auth-validation-errors :errors="$errors" />

            <form action="{{ route('register') }}" method="post">
                @csrf
                <p id="subtitle">Ste tu nový? Vyplňte formulár a uľahčite si u nás vaše nákupy </p>

                <label for="email">E-mail:</label>
                <input id="email" type="email" name="email" :value="old('email')" required>

                <label for="password">Heslo:</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" >

                <label for="password-confirm">Zopakovať heslo:</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>

                <button type="submit" class="button-login big-button">Registrovať sa</button>
            </form>
        </section>
    </div>
</main>
@endsection
