@extends('base')
@section('title', 'Liste des Voyages')
@section('content')
    <h1>Liste des Voyages</h1>
    @foreach ($trips as $trip)
        <div>
            <h2>{{ $trip->title }}</h2>
            <p>
                <a href="{{ route('voyage.show', ['slug' => $trip->title])}}">Voir le voyage</a>
            </p>
        </div>
    @endforeach
@endsection