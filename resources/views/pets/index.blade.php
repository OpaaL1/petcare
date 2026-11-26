@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Hewan</h3>
        <a href="{{ route('pets.create') }}" class="btn btn-primary">+ Tambah Hewan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th><th>nama</th><th>jenis</th><th>Ras</th>
                            <th>kelamin</th><th>Berat</th><th>Pemilik</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pets as $pet)
                            <tr>
                                <td>{{ $pets->firstItem() + $loop->index }}</td>
                                <td>{{ $pet->name }}</td>
                                <td>{{ $pet->species }}</td>
                                <td>{{ $pet->breed ?? '-' }}</td>
                                <td>{{ ucfirst($pet->gender) }}</td>
                                <td>{{ $pet->weight ? $pet->weight . ' Kg' : '-' }}</td>
                                <td>{{ $pet->owner->name }}</td>
                                <td>
                                    <a href="{{ route('pets.edit', $pet) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus hewan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr><td colspan="8" class="text-center">Belum ada data.</td></tr>
                            @endforelse
                    </tbody> 
                </table>
            </div>
            {{ $pets->links() }}
        </div>
    </div>
</div>
@endsection