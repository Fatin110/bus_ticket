<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Trip</title>
    <style>
        table {
            /* background-color: green; */
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            /* margin: 0 auto; */
            /* box-shadow: 0 0 0 20px lightblue; */
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 1.2em;
            text-align: center;
        }

        td {
            font-size: 1em;
        }

        h1 {
            background: lightblue;
            text-align: center;
        }

        body {
            display: flex;
            justify-content: center;
            /* background-color: lightcoral; */
        }

        .search {
            width: 30%;
            padding-left: 25px;
        }

        .table {
            width: 65%;

        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="text"],
        input[type="date"],
        input[type="time"],
        input[type="submit"] {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="search">
        <h2>Search Trips</h2>
        <form action="{{ route('/searchTrip') }}" method="POST">
            @csrf

            <label for="from">From:</label>
            <input type="text" name="from" required>
            <br><br>

            <label for="to">To:</label>
            <select id="to" name="to" required>
                <option value="Comilla">Comilla</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Cox's Bazaar">Cox's Bazaar</option>
            </select>
            <br><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <br><br>

            <input type="submit" value="Submit">
        </form>
    </div>



    <div class="table">
        <table class="min-w-full divide-y divide-gray-200">
            <h1>All Bus Trips</h1>
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Start</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Total Seats</th>
                   
                    <th>Book</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @if (request()->isMethod('post'))

                    @if ($searchedTrip->count() === 0)
                        <tr style="border: none;">
                            <td style="border:none; color: red; font-size: 1.2em;">No Bus Available</td>
                        </tr>

                    @else
                    @foreach ($searchedTrip as $searchTrip)
                        <tr>
                            {{-- <td>{{ $trip->id }}</td> --}}
                            <td>{{ $searchTrip->from }}</td>
                            <td>{{ $searchTrip->to }}</td>
                            <td>{{ $searchTrip->date }}</td>
                            <td>{{ $searchTrip->time }}</td>
                            <td>{{ $searchTrip->seats }}</td>

                            <td><a href="{{ route('/bookSeat', ['tripId' => $searchTrip->id]) }}">Book Seats</a></td>

                            <!-- Add more table cells for other columns -->
                        </tr>
                    @endforeach
                    @endif
                @else
                    @foreach ($allTrips as $trip)
                        <tr>
                            {{-- <td>{{ $trip->id }}</td> --}}
                            <td>{{ $trip->from }}</td>
                            <td>{{ $trip->to }}</td>
                            <td>{{ $trip->date }}</td>
                            <td>{{ $trip->time }}</td>
                            <td>{{ $trip->seats }}</td>

                            <td><a href="{{ route('/bookSeat', ['tripId' => $trip->id]) }}">Book Seats</a></td>

                            <!-- Add more table cells for other columns -->
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
