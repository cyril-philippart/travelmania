@extends('base')
@section('title', 'Se connecter')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4" style="max-width: 400px; margin: 0 auto; border-radius: 10px;">
            <h2 class="text-center mb-4">Se connecter</h2>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail :</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                   
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-dark">Se connecter</button>
                </div>
                <div class="text-center">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>    
            </form>
        </div>
    </div>
@endsection
