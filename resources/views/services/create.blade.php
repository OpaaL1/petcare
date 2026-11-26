@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tambah Layanan</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST">
                @include('services._form')
            </form>
        </div>
    </div>
</div>
@endsection