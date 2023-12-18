@extends('base')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 bg-secondary p-4 rounded">
            <h1>Edit Fruit</h1>
        
            <form action="{{ route('fruits.update', $fruit->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="text-white">
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
            
                    <div class="form-group">
                        <label for="stocks">Stocks</label>
                        <input type="number" class="form-control" name="stocks" id="stocks" value="{{ $fruit->stocks }}" required>
                    </div>
                </div>
        
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection