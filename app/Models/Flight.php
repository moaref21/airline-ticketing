<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'airline',
        'origin',
        'destination',
        'departure',
        'arrival',
        'price',
        'seats',
        'remaining_seats'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
