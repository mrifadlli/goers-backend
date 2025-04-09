<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = [
            "Kushi Tsuru",
            "Osakaya Restaurant",
            "The Stinking Rose",
            "McCormick & Kuleto's",
            "Mifune Restaurant",
            "The Cheesecake Factory",
            "New Delhi Indian Restaurant",
            "Iroha Restaurant",
            "Rose Pistola",
            "Alioto's Restaurant",
            "Canton Seafood & Dim Sum Restaurant",
            "All Season Restaurant",
            "Bombay Indian Restaurant",
            "Sam's Grill & Seafood Restaurant",
            // "2G Japanese Brasserie",
            // "Restaurant Lulu",
            // "Sudachi",
            // "Hanuri",
            // "Herbivore",
            // "Penang Garden",
            // "John's Grill",
            // "Quan Bac",
            // "Bamboo Restaurant",
            // "Burger Bar",
            // "Blu Restaurant",
            // "Naan 'N' Curry",
            // "Shanghai China Restaurant",
            // "Tres",
            // "Isobune Sushi",
            // "Viva Pizza Restaurant",
            // "Far East Cafe",
            // "Parallel 37",
            // "Bai Thong Thai Cuisine",
            // "Alhamra",
            // "A-1 Cafe Restaurant",
            // "Nick's Lighthouse",
            // "Paragon Restaurant & Bar",
            // "Chili Lemon Garlic",
            // "Bow Hon Restaurant",
            // "San Dong House",
            // "Thai Stick Restaurant",
            // "Cesario's",
            // "Colombini Italian Cafe Bistro",
            // "Sabella & La Torre",
            // "Soluna Cafe and Lounge",
            // "Tong Palace",
            // "India Garden Restaurant",
            // "Sapporo-Ya Japanese Restaurant",
            // "Santorini's Mediterranean Cuisine",
            // "Kyoto Sushi",
            // "Marrakech Moroccan Restaurant"
        ];

        foreach ($restaurants as $name) {
            Restaurant::firstOrCreate(['name' => $name]);
        }
    }
}
