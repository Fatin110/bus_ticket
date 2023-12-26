<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trip;
use App\Models\User;
use App\Models\Seat;
use App\Models\BookedSeat;
use App\Http\Controllers\Session;

class TestController extends Controller
{

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('register');
        }

        return $next($request);
    }

    function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password'); // Assuming you're using 'email' and 'password' for login

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->route('/home');
        } else {
            // Authentication failed
            return redirect()->route('login'); // Redirect back with an error message
        }
    }

    function logoutUser()
    {
        Auth::logout(); // Logs out the currently authenticated user

        return redirect()->route('register');
    }

    function showHome()
    {
        return view('dashboard');
    }

    function createTrip()
    {
        return view('createTrip');
    }

    function createBusTrip(Request $request)
    {


        Trip::create([
            'to' => $request->input('to'),
            // 'price' => 500,
            'date' => $request->input('date'),
            'time' => $request->input('time')
        ]);

        $tripId = Trip::latest()->value('id');
        $numberOfSeats = 36;

        for ($i = 1; $i <= $numberOfSeats; $i++) {
            $seat = new Seat();
            $seat->seat_number = $i;
            $seat->trip_id = $tripId;
            $seat->booked = false;
            $seat->save();
        }



        return redirect()->route('/home');
    }

    function bookTrip()
    {
        $allTrips = Trip::orderBy('date')->get();

        return view('bookTrip')->with(['allTrips' => $allTrips]);
    }

    function searchTrip(Request $request)
    {
        $fromSearch = $request->input('from');
        $toSearch = $request->input('to');
        $dateSearch = $request->input('date');

        $searchedTrip = Trip::orderBy('date')->where('from', $fromSearch)->where('to', $toSearch)->where('date', $dateSearch)->get();

        return view('bookTrip')->with(['searchedTrip' => $searchedTrip]);
    }

    function bookSeat()
    {
        return view('bookSeat');
    }

    function seatsBooked(Request $request)
    {

        $selectedSeats = $request->input('seats', []);
        $tripId = $request->input('tripId');


         // Retrieve the stored array or create a new one if it doesn't exist
         $storedSeats = session()->get('stored_seats', []);

         // Merge the selected buttons with the stored ones
         $storedSeats = array_merge($storedSeats, $selectedSeats);

         // Store the updated array in the session
         session()->put('storedSeats', $storedSeats);





        $bookedSeats = Seat::whereIn('seat_number', $selectedSeats)->where('trip_id', $tripId)->update([
            'booked' => true
        ]);


        $bookedBy = Auth::user();

        BookedSeat::create([
            'booked_by' => $bookedBy->name,
            'trip_id' => $tripId,
            'phone' => $bookedBy->phone,
            'user_id' => $bookedBy->id
        ]);

         // Return the view
         return view('bookSeat')->with('storedSeats', $storedSeats);


        // return view('bookSeat',['booked_seats' => $selectedSeats, 'tripId' => $tripId]);
    }
}
