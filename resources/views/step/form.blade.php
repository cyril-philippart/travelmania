<form action="" method="post">
    @csrf
    @dump($trip)
    <input type="hidden" name="trips_id" value="{{ $trip->id }}">
    <div class="form-group mb-3">
        <label class="form-label">Type de transport :</label>
        <input class="form-control" type="text" name="type">
        @error('type')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Numéro de réservation :</label>
        <input class="form-control" type="text" name="number">
        @error('number')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Départ :</label>
        <input class="form-control" type="text" name="departure">
        @error('departure')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Arrivée :</label>
        <input class="form-control" type="text" name="arrival">
        @error('arrival')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Siège :</label>
        <input class="form-control" type="text" name="seat">
        @error('seat')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Porte :</label>
        <input class="form-control" type="text" name="gate">
        @error('gate')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Enregistrement des bagages :</label>
        <input class="form-control" type="text" name="baggage_drop">
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