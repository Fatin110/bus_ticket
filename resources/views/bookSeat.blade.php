<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Seats</title>
</head>
<style>
    /* Updated style for seats */
    .bus-seats {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .seat {
        width: 80px;
        height: 80px;
        background-color: #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #aaa;
        border-radius: 5px;
    }

    .seat input[type="checkbox"] {
        display: none;
    }


    .seat input[type="checkbox"]:disabled+.seat-label {
        background-color: red;
        cursor: not-allowed;
    }

    .seat-label {
        cursor: pointer;
    }

    .seat.selected {
        background-color: lightgreen;
    }

    a {
        text-decoration: none;
    }

    button {
        font-size: 20px;
        padding: 15px;
    }
</style>

<body>
    <form method="POST" action="{{ route('/booked_seats') }}">
        @csrf
        <div class="bus-seats">
            @for ($i = 1; $i <= 36; $i++)
                @php
                if (isset($storedSeats))
                    $disabled = in_array($i, $storedSeats) ? 'disabled' : '';

                @endphp
                <div class="seat">
                    <input type="hidden" name="tripId" value="{{ request('tripId') }}">
                    <input type="checkbox" id="seat{{ $i }}" class="seat-checkbox" name="seats[]" @if (isset($storedSeats)) {{ $disabled }} @endif value="{{ $i }}">
                    <label for="seat{{ $i }}" class="seat-label">{{ $i }}</label>
                </div>
            @endfor
            <button type="submit">Book Seats</button>
        </div>
    </form>





    <script>
        const seats = document.querySelectorAll('.seat');

        seats.forEach((seat) => {
            seat.addEventListener('click', () => {
                const checkbox = seat.querySelector('.seat-checkbox');
                checkbox.checked = !checkbox.checked;

                if (checkbox.checked) {
                    seat.classList.add('selected');
                } else {
                    seat.classList.remove('selected');
                }
            });
        });



    </script>
</body>

</html>
