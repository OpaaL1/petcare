@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Edit Hewan</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pets.update', $pet) }}" method="POST">
                @method('PUT')
                @include('pets._form')
            </form>
        </div>
    </div>
</div>
@endsection