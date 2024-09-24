<form action="" method="post" class="w-50 mx-auto">
    @csrf
    <div class="form-group mb-4">
        <label class="form-label">Nom du voyage :</label>
        <input class="form-control" type="text" name="title" value="{{ old('title', $trip->title) }}">
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-dark">
        @if ($trip->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
