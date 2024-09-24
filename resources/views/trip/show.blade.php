@extends('base')
@section('title', $trip->title)
@section('content')
    <div>
        <h1>{{ $trip->title }}</h1>
        <a class="btn btn-primary" href="{{ route('etape.create', ['trip' => $trip->id])}}">Ajouter une étape</a>
    </div>
@endsection