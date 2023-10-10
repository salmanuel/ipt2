@extends('base')

@section('content')
<div class="container">
    <h1>Add New Hero</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('heroes.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="lore">Lore:</label>
            <textarea class="form-control" id="lore" name="lore">{{ old('lore') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Hero</button>
    </form>
</div>
@endsection
