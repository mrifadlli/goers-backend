<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\OpeningHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('openingHours')
        ->latest() 
        ->get();
        return RestaurantResource::collection($restaurants);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $restaurant = Restaurant::create([
                'name' => $request->name
            ]);

            foreach ($request->opening_hours as $hour) {
                OpeningHour::create([
                    'restaurant_id' => $restaurant->id,
                    'day' => $hour['day'],
                    'open_time' => $hour['open_time'],
                    'close_time' => $hour['close_time'],
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Restaurant created successfully!',
                'data' => $restaurant->load('openingHours')
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to create restaurant.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function view($id)
    {
        $restaurant = Restaurant::with('openingHours')->find($id);

        if (!$restaurant) {
            return response()->json([
                'success' => false,
                'message' => 'Restaurant not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Restaurant detail fetched successfully!',
            'data' => new RestaurantResource($restaurant),
        ], 200);
    }
}
