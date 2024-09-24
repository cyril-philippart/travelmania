@extends('base')
@section('title', $trip->title)
@section('content')
    <div>
        <h1>{{ $trip->title }}</h1>
        @foreach ($steps as $step)
            <div>
                <h2>{{ $step->type }}</h2>
                <p>{{ $step->number }}</p>
                <p>{{ $step->departure }}</p>
                <p>{{ $step->arrival }}</p>
                <p>{{ $step->seat }}</p>
                <p>{{ $step->gate }}</p>
                <p>{{ $step->baggage_drop }}</p>
            </div>
            
        @endforeach
        <a class="btn btn-primary" href="{{ route('etape.create', ['trip' => $trip->id])}}">Ajouter une étape</a>
    </div>
@endsection