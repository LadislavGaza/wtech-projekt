@extends('layouts.main', ['title' => 'Prihlásenie'])

@push('styles')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush
 
@section('content')
<main class="center">
    <div class="login-page content-middle">
        <section class="login-form">
        <h1>Prihlásenie</h1>
        <form action="/login.php" method="post">
            <label for="email">E-mail:</label>
            <input type="text" id="email">
            <label for="password">Heslo:</label>
            <input type="password" id="password">
            <button type="submit" class="button-login big-button">Prihlásiť sa</button>
        </form>
        </section>
        <section class="login-register-link">
            <h1>Nemáte ešte účet</h1>
            <a href="register.html" class="button-login big-button">Registrovať sa</a>
        </section>
    </div>
</main>
@endsection