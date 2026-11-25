@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tambah Pemilik</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('owners.store') }}" method="POST">
                @include('owners._form')
            </form>
        </div>
    </div>
</div>
@endsection