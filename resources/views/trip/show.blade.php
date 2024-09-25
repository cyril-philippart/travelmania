@extends('base')
@section('title', $trip->title)
@section('content')
    <div class="text-center mb-4">
        <h2>{{ $trip->title }}</h2>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <h5>Étapes du voyage</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Numéro</th>
                        <th>Départ</th>
                        <th>Arrivée</th>
                        <th>Siège</th>
                        <th>Porte</th>
                        <th>Enregistrement des bagages</th>
                        @auth
                            <th>Actions</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach ($steps as $index => $step) <!-- Utilise $index pour le numéro d'étape -->
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Incrémentation du numéro d'étape -->
                            <td>{{ $step->type }}</td>
                            <td>{{ $step->number }}</td>
                            <td>{{ $step->departure }}</td>
                            <td>{{ $step->arrival }}</td>
                            <td>{{ $step->seat }}</td>
                            <td>{{ $step->gate }}</td>
                            <td>{{ $step->baggage_drop }}</td>
                            @auth
                                <td>
                                    @if(Auth::id() === $trip->user_id || Auth::user()->hasRole('admin'))
                                        <a class="btn btn-warning btn-sm" href="{{ route('etape.edit', ['trip' => $trip->id, 'step' => $step->id]) }}">Modifier</a>
                                        <form action="{{ route('etape.destroy', ['trip' => $trip->id, 'step' => $step->id]) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette étape ?')">Supprimer</button>
                                        </form>
                                    @endif
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @auth
        @if(Auth::id() === $trip->user_id || Auth::user()->hasRole('admin'))
            <div class="text-center mt-4">
                <a class="btn btn-success" href="{{ route('etape.create', ['trip' => $trip->id]) }}">Ajouter une étape</a>
            </div>
        @endif
    @endauth
@endsection
