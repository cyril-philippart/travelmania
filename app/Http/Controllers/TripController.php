<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormTripRequest;
use App\Models\Trips;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class TripController extends Controller
{

    public function create(): View
    {
        $trip = new Trips();
        return view('trip.create',[
            'trip' => $trip
        ]);
    }
    
    public function store(FormTripRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $trip = Trips::create($validatedData);
        return redirect()->route('etape.create', ['trip' => $trip]);
    }

    public function edit(Trips $trip) 
    {
        return view('trip.edit' , [
            'trip' => $trip
        ]);
    }

    public function update(Trips $trip, FormTripRequest $request) 
    {
        $trip->update($request->validated());
        return redirect()->route('voyage.show', ['trip' => $trip->title])->with('success', 'Voyage modifié avec succès');
    }

    public function index(): View
    {
        return view('trip.index', [
            'trips' => Trips::all()
        ]);
    } 

    public function show(Trips $trip): View
    {
        $steps = $trip->steps;
        return view('trip.show', [
            'trip' => $trip,
            'steps' => $steps
        ]);
    }

    public function destroy(Trips $trip) 
    {
        $trip->delete();
        return redirect()->route('voyage.index')->with('success', 'Voyage supprimé avec succès');
    }
}
