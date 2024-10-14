@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <h2>List of albums</h2>

        {{-- <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('artists.create') }}" class="btn btn-primary">Add artist</a>
                </div>
            </div>

            <div class="row">
                <x-table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($artists as $artist)
                        <tr>
                            <td><a href="{{ route('artists.show', $artist->id) }}">{{ $artist->id }}</a></td>
                            <td><a href="{{ route('artists.show', $artist->id) }}">{{ $artist->name }}</a></td>
                            <td>{{ $artist->description }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $artist->image_path) }}" alt="{{ $artist->name }}" class="rounded-circle" style="width: 10rem; height: 10rem;">
                            </td>
                            <td class="gap-2 d-flex justify-content-center">
                                <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('artists.destroy', $artist->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </x-table>
                {{ $artists->links() }}
            </div>
        </div> --}}

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

    </div>
</div>
@endsection
