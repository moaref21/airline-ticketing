<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::paginate(10);;
        return view('admin.flights.index', compact('flights'));
    }

    public function create()
    {
        return view('admin.flights.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'flight_number' => 'required|unique:flights',
            'airline' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'departure' => 'required|date',
            'arrival' => 'required|date|after:departure',
            'price' => 'required|numeric',
            'seats' => 'required|integer'
        ]);

        $validated['remaining_seats'] = $validated['seats'];

        Flight::create($validated);

        return redirect()->route('admin.flights.index')->with('success', 'تمت إضافة الرحلة بنجاح!');
    }
}
