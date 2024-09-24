@extends('base')
@section('title', 'Liste des Voyages')
@section('content')
    <h1>Liste des Voyages</h1>
    @foreach ($trips as $trip)
        <div>
            <h2>{{ $trip->title }}</h2>
            <p>
                <a href="{{ route('voyage.show', ['trip' => $trip->slug])}}">Voir le voyage</a>
            </p>
        </div>
        <form action="{{ route('voyage.destroy', ['trip' => $trip->slug]) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Supprimer</button>
        </form> 
    @endforeach
@endsection