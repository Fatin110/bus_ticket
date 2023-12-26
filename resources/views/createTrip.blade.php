<!DOCTYPE html>
<html>
<head>
  <title>Create Trip Form</title>
  <link rel="stylesheet" href="{{ asset('css/createTrip.css') }}">
</head>
<body>

<form action="{{ route('/createBusTrip') }}" method="POST">
    @csrf
    <h1>Create a Trip</h1>

  <label for="from">From:</label>
   <input type="text" value="Dhaka" name="from" disabled>
  <br><br>

  <label for="to">To:</label>
  <select id="to" name="to">
    <option value="Comilla">Comilla</option>
    <option value="Chittagong">Chittagong</option>
    <option value="Cox's Bazaar">Cox's Bazaar</option>
  </select>
  <br><br>

  <label for="date">Date:</label>
  <input type="date" id="date" name="date">
  <br><br>

  <label for="time">Time:</label>
  <input type="time" id="time" name="time">
  <br><br>

  <input type="submit" value="Submit">
</form>

</body>
</html>
