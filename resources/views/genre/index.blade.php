@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <h2>List of genres</h2>

        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('genres.create') }}" class="btn btn-primary">Add genre</a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($genres as $genre)
                        <tr>
                            <td><a href="{{ route('genres.show', ['genre' => $genre->id]) }}">{{$genre->id}}</a></td>
                            <td><a href="{{ route('genres.show', ['genre' => $genre->id]) }}">{{$genre->name}}</a></td>
                            <td>
                                <div class="w-5" style="background-color: {{ $genre->hex_color }}; height: 3rem;">
                                </div>
                            </td>
                            <td class="d-flex">
                                <a href="{{route('genres.edit', ['genre' => $genre->id])}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('genres.destroy', ['genre' => $genre->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $genres->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
