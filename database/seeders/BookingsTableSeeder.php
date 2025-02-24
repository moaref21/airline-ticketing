<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Flight;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flights = Flight::all();
        $users = User::where('is_admin', false)->get();

        foreach ($flights as $flight) {
            $numBookings = rand(0, 30);
            
            for ($i = 0; $i < $numBookings; $i++) {
                Booking::create([
                    'user_id' => $users->random()->id,
                    'flight_id' => $flight->id,
                    'status' => 'confirmed',
                    'payment_id' => 'PAY-' . uniqid()
                ]);
                
                $flight->decrement('remaining_seats');
            }
        }
    }
}
