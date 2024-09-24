<form action="" method="post">
    @csrf
    <input type="hidden" name="trips_id" value="{{ $trip->id }}">
    <div class="form-group mb-3">
        <label class="form-label">Type de transport :</label>
        <input class="form-control" type="text" name="type" value="{{ old('type', $step->type) }}">
        @error('type')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Numéro de réservation :</label>
        <input class="form-control" type="text" name="number" value="{{ old('number', $step->number) }}">
        @error('number')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Départ :</label>
        <input class="form-control" type="text" name="departure" value="{{ old('departure', $step->departure) }}">
        @error('departure')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Arrivée :</label>
        <input class="form-control" type="text" name="arrival" value="{{ old('arrival', $step->arrival) }}">
        @error('arrival')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Siège :</label>
        <input class="form-control" type="text" name="seat" value="{{ old('seat', $step->seat) }}">
        @error('seat')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Porte :</label>
        <input class="form-control" type="text" name="gate" value="{{ old('gate', $step->gate) }}">
        @error('gate')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Enregistrement des bagages :</label>
        <input class="form-control" type="text" name="baggage_drop" value="{{ old('baggage_drop', $step->baggage_drop) }}">
        @error('baggage_drop')
            {{ $message }}
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($step->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>