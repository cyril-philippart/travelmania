@extends('base')
@section('title', 'Créer un Voyage')
@section('content')
    <form action="" method="post">
        @csrf
        <div>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <button>Créer</button>
    </form>
@endsection