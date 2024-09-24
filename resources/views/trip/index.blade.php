@extends('base')
@section('title', 'Liste des Voyages')
@section('content')
    <div class="position-relative text-center mb-4">
        <h1>Liste des Voyages</h1>
        @auth
            <a class="add_travel btn btn-success" href="{{ route('voyage.create') }}">Ajouter un voyage</a>
        @endauth
    </div>

    @foreach ($trips as $trip)
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h2 class="card-title mb-0">
                    <a class="text-black text-decoration-none" href="{{ route('voyage.show', ['trip' => $trip->slug]) }}">
                        {{ $trip->title }}
                    </a>
                </h2>
            </div>
            <div class="d-flex">
                <p class="card-text mb-0 me-2">
                    <a class="btn btn-dark" href="{{ route('voyage.show', ['trip' => $trip->slug]) }}">Voir</a>
                </p>
                @auth
                    <p class="card-text mb-0 me-2">
                        <a class="btn btn-warning" href="{{ route('voyage.edit', ['trip' => $trip->slug]) }}">Modifier</a>
                    </p>
                    <form action="{{ route('voyage.destroy', ['trip' => $trip->slug]) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce voyage ?')">Supprimer</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
    @endforeach
@endsection
