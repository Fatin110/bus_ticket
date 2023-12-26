<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RegistrationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TestController::class, 'loginUser']);

Route::get('/home', [TestController::class, 'showHome'])->name('/home');

Route::get('/create-trip', [TestController::class, 'createTrip'])->name('createTrip');
Route::post('/createBusTrip',[TestController::class, 'createBusTrip'])->name('/createBusTrip');

Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/logout',[TestController::class, 'logoutUser'])->name('logout');

Route::get('login', function(){
   return view ('auth.login');
})->name('loginView');

Route::post('login', [TestController::class, 'loginUser'])->name('login');

Route::get('bookTrip', [TestController::class, 'bookTrip'])->name('bookTrip');
Route::post('/searchTrip', [TestController::class, 'searchTrip'])->name('/searchTrip');

// Route::get('/bookSeat', function(){
//     return view ('bookSeat');
// })->name('/bookSeat');

Route::get('/bookSeat',[TestController::class, 'bookSeat'])->name('/bookSeat');
Route::post('/booked_seats', [TestController::class, 'seatsBooked'])->name('/booked_seats');
