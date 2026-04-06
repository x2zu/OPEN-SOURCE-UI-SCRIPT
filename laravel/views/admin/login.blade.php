<!DOCTYPE html>
<html>

<head>
    <title>Login Admin</title>
</head>

<body>
    <h2>Login Admin</h2>
    @if (session('error'))
        <p style="color:red;">
            {{ session('error') }}
        </p>
    @endif
    <form method="POST" action="/admin/login">
        @csrf
        <div>
            <label>Username</label><br>
            <input type="text" name="username" placeholder="Masukkan username">
        </div>
        <br>
        <div>
            <label>Password</label><br>
            <input type="password" name="password" placeholder="Masukkan password">
        </div>
        <br>
        <button type="submit">Login</button>
    </form>
</body>

</html>
