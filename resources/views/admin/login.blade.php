<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Antiquea - Admin</title>
    <link href="css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin-login.css">
</head>
<body>
    <main id="admin-login-page">
        <form id="admin-login-form" action="{{ url('admin') }}" method="post">
            @csrf
            <img class="logo" src="{{ asset('images/logo.png') }}">
            <h1>Administrácia</h1>
            <label for="email" class="login-form-field">Email</label>
            <input type="text" id="email" name="email" class="username login-form-field" required autofocus>
            <label for="password" class="login-form-field">Heslo</label>
            <input type="password" id="password" name="password" 
                   class="password login-form-field" required autocomplete="current-password">
            <button type="submit" class="btn admin-login-button">Prihlásiť sa</button>
            @if($errors->any())
                <p class="input-error">{{ $errors->first() }}<p>
            @endif
        </form>
    </main>
</body>
</html>