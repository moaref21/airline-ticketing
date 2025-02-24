<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Flight;
use App\Notifications\NewBookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Auth::user()->bookings()->with('flight')->get();
        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $flight = Flight::findOrFail($request->flight_id);

        if ($flight->remaining_seats < 1) {
            return response()->json(['error' => 'No seats available'], 400);
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'flight_id' => $flight->id,
            'status' => 'pending'
        ]);

        $flight->decrement('remaining_seats');

        $user = Auth::user();
        $user->notify(new NewBookingNotification($booking));

        return response()->json($booking, 201);
    }

    public function confirm(Booking $booking)
{
    if ($booking->user_id !== Auth::id()) {
        abort(403);
    }

    $paymentId = 'PAY-' . strtoupper(uniqid());
    
    $booking->update([
        'status' => 'confirmed',
        'payment_id' => $paymentId
    ]);

    return response()->json([
        'message' => 'Payment successful',
        'payment_id' => $paymentId
    ]);
}
}
