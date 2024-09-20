<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripFilterRequest;
use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    public function index(TripFilterRequest $request): View
    {
        return view('trip.index', [
            'trips' => Trip::all()
        ]);
    }

    public function show(Trip $trip): View
    {
        return view('trip.show', [
            'trip' => $trip
        ]);
    }


}
