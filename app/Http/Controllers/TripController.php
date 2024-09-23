<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
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
    
    public function store(FormPostRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $trip = Trips::create($validatedData);
        return redirect()->route('voyage.show', ['trip' => $trip->slug])->with('success', 'Voyage créé avec succès');
    }

    public function edit(Trips $trip) 
    {
        return view('trip.edit' , [
            'trip' => $trip
        ]);
    }

    public function update(Trips $trip, FormPostRequest $request) 
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
        dd($trip);
        return view('trip.show', [
            'trip' => $trip
        ]);
    }
}
