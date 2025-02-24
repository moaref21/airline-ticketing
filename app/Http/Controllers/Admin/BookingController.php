<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('flight')->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }
}
