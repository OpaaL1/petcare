@extends('layouts.app')
@section('content')

<div class="container">
    <h3>Tambah Hewan</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pets.store') }}" method="POST">
                @include('pets._form')
            </form>
        </div>
    </div>
</div>
@endsection