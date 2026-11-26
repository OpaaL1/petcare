@csrf
<div class="mb-3">
    <label class="form-label">Nama Layanan</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $services->name ?? '') }}">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $services->description ?? '') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Harga (Rp)</label>
    <input type="number" name="price" min="0" class="form-control @error('price') is-invalid @enderror"
        value="{{ old('price', $services->price ?? '') }}">
    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Durasi (menit)</label>
    <input type="number" name="duration" min="1" class="form-control @error('duration') is-invalid @enderror"
        value="{{ old('duration', $services->duration ?? '') }}">
    @error('duration') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('services.index') }}" class="btn btn-secondary">Batal</a>