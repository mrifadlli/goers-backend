<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\OpeningHour;

class OpeningHourSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            "Kushi Tsuru" => [
                ["days" => ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'], "open" => "11:30", "close" => "21:00"],
            ],
            "Osakaya Restaurant" => [
                ["days" => ['Mon', 'Tue', 'Wed', 'Thu', 'Sun'], "open" => "11:30", "close" => "21:00"],
                ["days" => ['Fri', 'Sat'], "open" => "11:30", "close" => "21:30"],
            ],
            "The Stinking Rose" => [
                ["days" => ['Mon', 'Tue', 'Wed', 'Thu', 'Sun'], "open" => "11:30", "close" => "22:00"],
                ["days" => ['Fri', 'Sat'], "open" => "11:30", "close" => "23:00"],
            ],
            "McCormick & Kuleto's" => [
                ["days" => ['Mon', 'Tue', 'Wed', 'Thu', 'Sun'], "open" => "11:30", "close" => "22:00"],
                ["days" => ['Fri', 'Sat'], "open" => "11:00", "close" => "23:00"],
            ],
            "Mifune Restaurant" => [
                ["days" => ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'], "open" => "11:00", "close" => "22:00"],
            ],
            "The Cheesecake Factory" => [
                ["days" => ['Mon', 'Tue', 'Wed', 'Thu'], "open" => "11:00", "close" => "23:00"],
                ["days" => ['Fri', 'Sat'], "open" => "11:00", "close" => "00:30"],
                ["days" => ['Sun'], "open" => "10:00", "close" => "23:00"],
            ],
            "New Delhi Indian Restaurant" => [
                ["days" => ['Mon', 'Sat'], "open" => "11:00", "close" => "22:00"],
                ["days" => ['Sun'], "open" => "17:30", "close" => "22:00"],
            ],
            "Iroha Restaurant" => [
                ["days" => ['Sun'], "open" => "11:30", "close" => "21:30"],
                ["days" => ['Fri', 'Sat'], "open" => "11:30", "close" => "22:00"],
            ],
            "Rose Pistola" => [
                ["days" => ['Mon', 'Tue', 'Wed', 'Thu'], "open" => "11:30", "close" => "22:00"],
                ["days" => ['Fri', 'Sun'], "open" => "11:30", "close" => "23:00"],
            ],
            "Alioto's Restaurant" => [
                ["days" => ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'], "open" => "11:00", "close" => "23:00"],
            ],
            "Canton Seafood & Dim Sum Restaurant" => [
                ["days" => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'], "open" => "10:30", "close" => "21:30"],
                ["days" => ['Sat', 'Sun'], "open" => "10:00", "close" => "21:30"],
            ],
            "All Season Restaurant" => [
                ["days" => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'], "open" => "10:00", "close" => "21:30"],
                ["days" => ['Sat', 'Sun'], "open" => "09:30", "close" => "21:30"],
            ],
            "Bombay Indian Restaurant" => [
                ["days" => ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'], "open" => "11:30", "close" => "22:30"],
            ],
            "Sam's Grill & Seafood Restaurant" => [
                ["days" => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'], "open" => "11:00", "close" => "21:00"],
                ["days" => ['Sat'], "open" => "17:00", "close" => "21:00"],
            ],

        ];

        foreach ($data as $restaurantName => $schedules) {
            $restaurant = Restaurant::where('name', $restaurantName)->first();

            if ($restaurant) {
                foreach ($schedules as $schedule) {
                    foreach ($schedule['days'] as $day) {
                        OpeningHour::create([
                            'restaurant_id' => $restaurant->id,
                            'day' => $day,
                            'open_time' => $schedule['open'],
                            'close_time' => $schedule['close'],
                        ]);
                    }
                }
            }
        }
    }
}
