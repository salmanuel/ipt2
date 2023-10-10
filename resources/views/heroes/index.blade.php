@extends('base')

@section('content')

<div class="container">
    <h1>Heroes List</h1>
    <a href="{{ route('heroes.create') }}" class="btn btn-primary mb-3">Create New Hero</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Lore</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($heroes as $hero)
                <tr>
                    <td>{{ $hero->id }}</td>
                    <td>{{ $hero->name }}</td>
                    <td>{{ $hero->description }}</td>
                    <td>{{ $hero->lore }}</td>
                    <td>
                        <a href="{{ route('heroes.show', $hero->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('heroes.edit', $hero->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('heroes.destroy', $hero->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
