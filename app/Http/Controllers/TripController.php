<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;

class TripController extends Controller
{
    public function index()
    {
        return Trip::all();
    }

    public function show($slug)
    {
        $trip = Trip::where('title', $slug)->first();
        return $trip;
    }


}
