@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Create a new artist</h2>
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        Your artist has been created successfully
    </div>
@endif

<div class="row">
       <hr>
       <form action="{{ route('artists.store') }}" enctype="multipart/form-data" method="post" class="col-lg-7">
           @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
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
                <p id="message-image-preview" class="mt-8">Image no loaded :(</p>
                <img id="preview-image" src="#" alt="Preview Image" class="w-50 img-fluid rounded-circle" style="display: none" />
            </div>

            <div>
                <label for="avatar">Choose a profile picture:</label>
                <input type="file" id="image_path" name="image_path" accept="image/png, image/jpeg" />
            </div>

            <div class="form-group">
               <label for="nombre">name</label>
               <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" />
            </div>

            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}" />
            </div>

            <button type="submit" class="btn btn-success">Save artist</button>
       </form>
   </div>
</div>

<script>
    document.getElementById('image_path').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const previewImage = document.getElementById('preview-image');
            const messageImagePreview = document.getElementById('message-image-preview');
            previewImage.src = URL.createObjectURL(file);
            previewImage.style.display = 'block';
            messageImagePreview.style.display = 'none';
        }
    });
</script>
@endsection
