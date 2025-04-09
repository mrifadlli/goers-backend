<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\OpeningHour;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function create()
    {
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'opening_hours' => 'required|array',
        ]);

        $openingHours = $request->input('opening_hours', []);

        $atLeastOneDayOpen = false;
        $errors = [];

        foreach ($openingHours as $day => $data) {
            if (isset($data['open']) && $data['open'] === '1') {
                $atLeastOneDayOpen = true;

                if (empty($data['start'])) {
                    $errors["opening_hours.$day.start"] = "Open time on $day is required.";
                }

                if (empty($data['end'])) {
                    $errors["opening_hours.$day.end"] = "Close time on $day is required.";
                }
            }
        }

        if (!$atLeastOneDayOpen) {
            return back()->with('failed', 'Please select at least one open day');
        }

        if (!empty($errors)) {
            return back()
                ->withErrors($errors)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $restaurant = Restaurant::create([
                'name' => $request->input('name'),
            ]);

            foreach ($openingHours as $day => $data) {
                if (isset($data['open']) && $data['open'] === '1') {
                    OpeningHour::create([
                        'restaurant_id' => $restaurant->id,
                        'day' => $day,
                        'open_time' => $data['start'],
                        'close_time' => $data['end'],
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Restaurant created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', 'Failed to create restaurant : ' . 'please fill day open, open time and close time');
        }
    }

    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }
}
