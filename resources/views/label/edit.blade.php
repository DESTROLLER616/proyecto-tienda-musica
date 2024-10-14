@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <h2>Edit Label</h2>
 </div>

 @if (session('success'))
     <div class="alert alert-success" role="alert">
         Your label has been created successfully
     </div>
 @endif

 <div class="row">
        <hr>
        <form action="{{ route('labels.update', $label->id) }}" enctype="multipart/form-data" method="post" class="col-lg-7">
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

            <h3>Image label</h3>
            <div class="container d-flex justify-content-center">
                <img id="preview-image" src="{{ asset('storage/'.$label->avatar) }}" alt="Preview Image" class="w-50 img-fluid rounded-circle" />
            </div>

            <div>
                <label for="avatar">Choose a profile picture:</label>
                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
            </div>

            <div class="form-group">
                <label for="nombre">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $label->name }}" />
            </div>

             <div class="form-group">
                 <label for="description">description</label>
                 <input type="text" class="form-control" id="description" name="description" value="{{ $label->description }}" />
             </div>
            <button type="submit" class="btn btn-success">Save Label</button>
        </form>
    </div>
 </div>

<script>
    document.getElementById('avatar').addEventListener('change', function() {
        const [file] = event.target.files;
        if (file) {
            const previewImage = document.getElementById('preview-image');
            previewImage.src = URL.createObjectURL(file);
        }
    });
</script>
@endsection
