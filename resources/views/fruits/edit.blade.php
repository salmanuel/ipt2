@extends('base')

@section('content')

<div class="container mt-5">
    <h1>Edit Fruit</h1>

    <form action="{{ route('fruits.update', $fruit->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="fruit_name">Fruit</label>
            <input type="text" class="form-control" name="fruit_name" id="fruit_name" value="{{ $fruit->fruit_name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $fruit->description }}" required>
        </div>

        <div class="form-group">
            <label for="classification">Classification</label>
            <input type="text" class="form-control" name="classification" id="classification" value="{{ $fruit->classification }}" required>

        </div>


        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>

@endsection