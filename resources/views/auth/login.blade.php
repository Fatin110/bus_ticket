<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/createTrip.css') }}">
</head>
<body>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email input -->
    <input type="email" name="email" placeholder="Email" required>

    <!-- Password input -->
    <input type="password" name="password" placeholder="Password" required>


    <input type="submit" value="Login">

    Not registered? <a href="{{route('register')}}">Register here</a>
</form>
</body>
</html>
