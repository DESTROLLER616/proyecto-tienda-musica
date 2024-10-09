@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <h2>Edit genre</h2>
 </div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        Your genre has been edited successfully
    </div>
@endif

<div class="row">
<hr>
<form action="{{ route('genres.update', $genre->id) }}" enctype="multipart/form-data" method="post" class="col-lg-7">
        @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
        @method('PUT')
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="nombre">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $genre->name }}" />
        </div>

            <div class="form-group">
                <label for="description">Color</label>
                <input type="color" class="form-control" id="hex_color" name="hex_color" value="{{ $genre->hex_color }}" />
            </div>
        <button type="submit" class="btn btn-success">Save Label</button>
</form>
 </div>
@endsection
