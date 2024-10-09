@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Edit artist {{ $artist->name }}</h2>
</div>

<div class="row">
    <form action="{{ route('artists.update', $artist->id) }}" enctype="multipart/form-data" method="post" class="col-lg-7">
        @csrf
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

        <h3>Image artist</h3>
        <div class="container d-flex justify-content-center">
            <img id="preview-image" src="{{ asset('storage/'.$artist->image_path) }}" alt="Preview Image" class="w-50 img-fluid rounded-circle" />
        </div>

        <div>
            <label for="avatar">Choose a profile picture:</label>
            <input type="file" id="image_path" name="image_path" accept="image/png, image/jpeg" />
        </div>

        <div class="form-group">
            <label for="nombre">name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $artist->name }}" />
        </div>

        <div class="form-group">
            <label for="nombre">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $artist->description }}" />
        </div>

        <button type="submit" class="btn btn-success">Edit artist</button>
    </form>
</div>

<script>
    document.getElementById('image_path').addEventListener('change', function() {
        const [file] = event.target.files;
        if (file) {
            const previewImage = document.getElementById('preview-image');
            previewImage.src = URL.createObjectURL(file);
        }
    });
</script>
@endsection
