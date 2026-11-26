@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Edit Layanan</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('services.update', $services) }}" method="POST">
                @method('PUT')
                @include('services._form')
            </form>
        </div>
    </div>
</div>
@endsection