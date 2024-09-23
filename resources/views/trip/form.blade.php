<form action="" method="post">
    @csrf
    <div class="form-group mb-3">
        <label class="form-label">Nom du voyage :</label>
        <input class="form-control" type="text" name="title" value="{{ old('title', $trip->title) }}">
        @error('title')
            {{ $message }}
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($trip->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>