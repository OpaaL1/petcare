@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-item-center mb-3">
        <h3>Data Pemilik</h3>
        <a href="{{ route('owners.create') }}" class="btn btn-primary">+ Tambah Pemilik</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped aligh-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($owners as $owner)
                        <tr>
                            <td>{{ $owners->firstItem() + $loop->index }}</td>
                            <td>{{ $owner->name }}</td>
                            <td>{{ $owner->phone }}</td>
                            <td>{{ $owner->email ?? '-'}}</td>
                            <td>{{ $owner->address ?? '-' }}</td>
                            <td>
                                <a href="{{ route('owners.edit', $owner) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form ection="{{ route('owners.destroy', $owner) }}" method='POST' class="d-inline"
                                    onsubmit="return confirm('Hapus pemilik ini? Hewan miliknya juga ikut terhapus')">
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
            {{ $owners->links() }}
        </div>
    </div>
</div>
@endsection