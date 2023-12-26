<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('css/createTrip.css') }}">
</head>
<body>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        <h1>Register</h1>
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="{{ old('phone') }}" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <div>
            <input type="submit" value="Register">
        </div>
        Already registered? <a href="{{route('loginView')}}">Login here</a>
    </form>
</body>
</html>
