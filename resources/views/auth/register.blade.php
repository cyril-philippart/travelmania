@extends('base')
@section('title', 'S\'inscrire')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4" style="max-width: 400px; margin: 0 auto; border-radius: 10px;">
            <h2 class="text-center mb-4">S'inscrire</h2>
            <form action="{{ route('register.goRegister') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Username :</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail :</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe :</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-dark">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
@endsection
