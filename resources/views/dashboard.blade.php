@extends('base')

@section('content')
    <!-- Navbar -->
    

    <div class="container">
        <h1>Fruits List</h1>
        <a href="{{ route('fruits.create') }}" class="btn btn-primary mb-3">Add New Fruit</a>
    
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Classification</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fruits as $fruit)
                    <tr>
                        <td>{{ $fruit->fruit_name }}</td>
                        <td>{{ $fruit->description }}</td>
                        <td>{{ $fruit->classification }}</td>
                        <td>
                            {{-- <a href="{{ route('fruits.show', $fruit->id) }}" class="btn btn-info">View</a> --}}
                            <a href="{{ route('fruits.edit', $fruit->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('fruits.destroy', $fruit->id) }}" method="POST" style="display: inline;">
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
