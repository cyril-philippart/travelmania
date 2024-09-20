<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTripRequest;
use App\Http\Requests\TripFilterRequest;
use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{

    public function create(): View
    {
        return view('trip.create');
    }
    
    public function store(CreateTripRequest $request)
    {
        $trip = Trip::create($request->validated());
        return redirect()->route('voyage.show', ['trip' => $trip->title])->with('success', 'Voyage créé avec succès');
    }

    public function index(): View
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
