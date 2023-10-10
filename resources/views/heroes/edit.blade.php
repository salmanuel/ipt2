@extends('base')

@section('content')
<div class="container">
    <h1>Edit Hero</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('heroes.update', $hero->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $hero->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $hero->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="lore">Lore:</label>
            <textarea class="form-control" id="lore" name="lore">{{ old('lore', $hero->lore) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
