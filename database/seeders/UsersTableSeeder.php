<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password123'),
                'is_admin' => false,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }

        User::factory(15)->create([
            'is_admin' => false,
            'password' => Hash::make('user@1234')
        ]);
    }
}
