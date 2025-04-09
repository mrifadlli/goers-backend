<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('openingHours')
        ->latest() 
        ->paginate(10);
        return view('restaurants.index', compact('restaurants'));
    }
}
