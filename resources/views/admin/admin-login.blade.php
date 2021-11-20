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
        <form id="admin-login-form" action="/admin-log.php" method="post">
            <img class="logo" src="{{ asset('images/logo.png') }}">
            <h1>Administrácia</h1>
            <label for="username" class="login-form-field">Uživateľské meno</label>
            <input type="text" id="username" class="username login-form-field">
            <label for="password" class="login-form-field">Heslo</label>
            <input type="password" id="password" class="password login-form-field">
            <button type="submit" class="btn admin-login-button">Prihlásiť sa</button>
        </form>
    </main>
</body>
</html>