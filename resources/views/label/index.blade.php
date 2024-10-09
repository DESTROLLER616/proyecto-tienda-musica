@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <h2>List of Labels</h2>

        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    Your label has been deleted successfully
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($labels as $label)
                        <tr>
                            <td>{{ $label->id }}</td>
                            <td>{{ $label->name }}</td>
                            <td>{{ $label->description }}</td>
                            <td>
                                <a href="{{ route('labels.edit', $label->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('labels.destroy', $label->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            {{ $labels->links() }}
        </div>

    </div>
</div>
@endsection
