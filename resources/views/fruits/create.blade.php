@extends('base')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 bg-secondary p-4 rounded">
            <h1 class="mb-4  text-center">Add Fruit</h1>

            <form action="{{ route('fruits.store') }}" method="POST">
                @csrf
                <div class="text-white">

                    <div class="form-group">
                        <label for="fruit_name" >Fruit</label>
                        <input type="text" class="form-control" name="fruit_name" id="fruit_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description" >Description</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                    <div class="form-group">
                        <label for="classification" >Classification</label>
                        <input type="text" class="form-control" name="classification" id="classification" required>
                    </div>
                    <div class="form-group">
                        <label for="stocks" >Stocks</label>
                        <input type="number" class="form-control" name="stocks" id="stocks" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-3">Add Fruit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection