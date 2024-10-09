@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Create a new Label</h2>
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        Your label has been created successfully
    </div>
@endif

<div class="row">
       <hr>
       <form action="{{ route('labels.store') }}" method="post" class="col-lg-7">
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


           <div class="form-group">
               <label for="nombre">name</label>
               <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" />
           </div>

            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}" />
            </div>
           <button type="submit" class="btn btn-success">Save Label</button>
       </form>
   </div>
</div>
@endsection
