@extends('base')
@section('title', $trip->title)
@section('content')
    <div>
        <h1>{{ $trip->title }}</h1>
    </div>
@endsection