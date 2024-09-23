<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Trip;
use Illuminate\Contracts\View\View;

class TripController extends Controller
{

    public function create(): View
    {
        $trip = new Trip();
        return view('trip.create',[
            'trip' => $trip
        ]);
    }
    
    public function store(FormPostRequest $request)
    {
        $trip = Trip::create($request->validated());
        return redirect()->route('voyage.show', ['trip' => $trip->title])->with('success', 'Voyage créé avec succès');
    }

    public function edit(Trip $trip) 
    {
        return view('trip.edit' , [
            'trip' => $trip
        ]);
    }

    public function update(Trip $trip, FormPostRequest $request) 
    {
        $trip->update($request->validated());
        return redirect()->route('voyage.show', ['trip' => $trip->title])->with('success', 'Voyage modifié avec succès');
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
