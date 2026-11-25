@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Edit Pemilik</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('owners.update'), $owner }}" method="POST">
                @method('PUT')
                @include('owners._form')
            </form>
        </div>
    </div>
</div>
@endsection