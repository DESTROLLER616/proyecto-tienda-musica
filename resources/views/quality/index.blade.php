@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <h2>List of qualitys</h2>

        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('qualities.create') }}" class="btn btn-primary">Add quality</a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($qualities as $quality)
                        <tr>
                            <td><a href="{{ route('qualities.show', ['quality' => $quality->id]) }}">{{$quality->id}}</a></td>
                            <td><a href="{{ route('qualities.show', ['quality' => $quality->id]) }}">{{$quality->name}}</a></td>
                            <td>{{ $quality->description }}</td>
                            <td class="d-flex">
                                <a href="{{route('qualities.edit', ['quality' => $quality->id])}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('qualities.destroy', ['quality' => $quality->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $qualities->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
