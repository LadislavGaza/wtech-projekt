@extends('layouts.main', ['title' => 'Prihlásenie'])

@push('styles')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush
 
@section('content')
<main class="center">
    <div class="login-page content-middle">
        <section class="login-form">    
            <h1>Prihlásenie</h1>
            @if($errors->any())
                <p class="input-error">{{ $errors->first() }}<p>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <label for="email">E-mail:</label>
                <input type="email" name="email" :value="old('email')" required autofocus>
                <label for="password">Heslo:</label>
                <input type="password" id="password" type="password" name="password" required autocomplete="current-password">
                <button type="submit" class="button-login big-button">Prihlásiť sa</button>
            </form>
        </section>
        <section class="login-register-link">
            <h1>Nemáte ešte účet</h1>
            <a href="{{ url('register') }}" class="button-login big-button">Registrovať sa</a>
        </section>
    </div>
</main>
@endsection