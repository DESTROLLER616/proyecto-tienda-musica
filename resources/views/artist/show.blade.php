@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <h2>Artist <span>{{ $artist->name }}</span></h2>

        <div class="container">
            <div class="row d-flex justify-content-center">
                <img src="{{ asset('storage/'. $artist->image_path) }}" alt="" class="w-50 img-fluid rounded-circle">
            </div>

            <h2 class="mt-4 fs-1 text-center fw-bolder">{{ $artist->name }}</h2>

            <p class="mt-4 fs-3 text-center">{{ $artist->description }}</p>

            <div class="w-100 d-flex justify-content-between">
                <a href="{{ route('artists.index') }}" class="w-25 btn btn-info">Back</a>
                <a href="{{ route('artists.edit', $artist->id) }}" class="w-25 btn btn-warning">Edit</a>
            </div>
        </div>

    </div>
</div>
@endsection
