@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Layanan</h3>
        <a href="{{ route('services.create') }}" class="btn btn-primary">+ Tambah Layanan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Durasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td>{{ $services->firstItem() + $loop->index }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->description ?? '-' }}</td>
                            <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                            <td>{{ $service->duration }} menit</td>
                            <td>
                                <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $services->links() }}
        </div>
    </div>
</div>
@endsection