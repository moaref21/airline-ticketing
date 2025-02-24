<?php

namespace Database\Seeders;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $airports = ['JED', 'RUH', 'DMM', 'MED', 'AQI', 'ELQ'];
        
        for ($i = 0; $i < 20; $i++) {
            $departure = Carbon::now()->addDays(rand(1, 30))->addHours(rand(1, 24));
            
            Flight::create([
                'flight_number' => 'SA' . rand(100, 999),
                'airline' => 'Saudi Airlines',
                'origin' => $airports[array_rand($airports)],
                'destination' => $airports[array_rand($airports)],
                'departure' => $departure,
                'arrival' => $departure->addHours(rand(1, 5)),
                'price' => rand(500, 3000),
                'seats' => 150,
                'remaining_seats' => 150
            ]);
        }
    }
}
