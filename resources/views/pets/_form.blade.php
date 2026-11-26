@php $pet = $pet ?? null; @endphp
@csrf

<div class="mb-3">
    <label class="form-label">Pemilik</label>
    <select name="owner_id" class="form-select @error('owner_id') is-invalid @enderror">
        <option value="">== Pilih Pemilik ==</option>
        @foreach ($owners as $owner)
            <option value="{{ $owner->id }}"
                {{ old('owner_id', $pet?->owner_id) == $owner->id ? 'selected' : '' }}>
                {{ $owner->name }}
            </option>
        @endforeach
    </select>
    @error('owner_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col=md-6 mb-3">
        <label class="form-label">Nama Hewan</label>
        <input type="text" name='name' class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $pet?->name) }}">
        @error ('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Jenis (Kucing, Anjing, dll.)</label>
        <input type="text" name="species" class="form-control @error('species') is-invalid @enderror"
               value="{{ old('species', $pet?->species) }}">
        @error ('name') 
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Ras (opsional)</label>
        <input type="text" name="breed" class="form-control @error('breed') is-invalid @enderror"
               value="{{ old('breed', $pet?->breed) }}">
        @error ('breed')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
            <option value="">== Pilih ==</option>
            <option value="jantan" {{ old('gender', $pet?->gender) == 'jantan' ? 'selected' : ''}}>Jantan</option>
            <option value="betina" {{ old('gender', $pet?->gender) == 'betina' ? 'selected' : ''}}>Betina</option>
        </select>
        @error('gender')
            <div class='invalid-feedback'>{{ $message}}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Lahir (opsional)</label>
        <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date', $pet?->birth_date?->format('Y-m-d')) }}">
        @error ('birth_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">berat (Kg, opsional)</label>
        <input type="number" step="0.01" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight', $pet?->weight) }}">
        @error ('weight')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Catatan (optional)</label>
    <textarea name="notes" rows="3" class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $pet?->notes) }}</textarea>
    @error ('notes')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('pets.index') }}" class="btn btn-secondary">Batal</a>