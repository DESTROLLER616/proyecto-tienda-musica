@extends('adminlte::page')
@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            Your quality has been created successfully
        </div>
    @endif

    <div class="row">
        <h2>Create qualitys</h2>

        <div class="container">
            <div class="row">
                <form action="{{ route('qualities.store') }}" enctype="multipart/form-data" method="post">
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

                    <button type="submit" class="btn btn-success">Save quality</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
