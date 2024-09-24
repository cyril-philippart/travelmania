<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormStepRequest;
use Illuminate\Contracts\View\View;
use App\Models\Steps;
use App\Models\Trips;

class StepsController extends Controller
{
    public function create(Request $request): View
    {
        $trip_id = $request->query('trip');
        $trip = Trips::findOrFail($trip_id);
        $step = new Steps();
        return view('step.create',[
            'step' => $step,
            'trip' => $trip
        ]);
    }

    public function store(FormStepRequest $request)
    {
        $validatedData = $request->validated();
        $step = Steps::create($validatedData);
        $trip = $step->trips;
        return redirect()->route('voyage.show', ['trip' => $trip->slug])->with('success', 'Étape ajoutée avec succès');
    }

    public function edit(Steps $step) 
    {
        $trip = $step->trips;
        return view('step.edit' , [
            'step' => $step,
            'trip' => $trip
        ]);
    }

    public function update(Steps $step, FormStepRequest $request) 
    {
        $step->update($request->validated());
        $trip = $step->trips;
        return redirect()->route('voyage.show', ['trip' => $trip->slug])->with('success', 'Étape modifiée avec succès');
    }

    public function destroy(Steps $step) 
    {
        $step->delete();
        $trip = $step->trips;
        return redirect()->route('voyage.show', ['trip' => $trip->slug])->with('success', 'Étape supprimée avec succès');
    }

}
