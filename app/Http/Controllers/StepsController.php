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
        return redirect()->back()->with('success', 'Étape créé avec succès');
    }
}
