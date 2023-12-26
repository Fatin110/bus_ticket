<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav>
    <h1>Greenline Bus Counter</h1>
  <ul>
    <li><a href="{{route('createTrip')}}">Create Trip</a></li>
    <li><a href="{{route('bookTrip')}}">Book Trip</a></li>
    <li class="logout"><a href="{{route('logout')}}">Logout</a></li>
  </ul>

</nav>

</body>
</html>

