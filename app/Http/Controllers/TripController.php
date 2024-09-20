<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    public function index(): View
    {
        return view('trip.index', [
            'trips' => Trip::all()
        ]);
    }

    public function show($slug): View
    {
        $trip = Trip::where('title', $slug)->first();
        return view('trip.show', [
            'trip' => $trip
        ]);
    }


}
