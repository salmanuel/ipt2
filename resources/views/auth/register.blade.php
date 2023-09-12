@extends('base')

@section('content')
    <div class="container col-md-6 offset-md-3 mt-5 border border-black rounded shadow shadow-lg" style="background-color: gray">
        <h1 class="text-center text-white mt-2">Register</h1>

        <form action="{{'/register'}}" method="POST">
        {{csrf_field()}}

        <div class="form-group mb-3">
            <label for="Name">Name</label>
            <input type="text" name="name" id="name" class="form-control border border-black">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group mb-3 ">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control border border-black">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control border border-black">
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border border-black">
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="d-flex mb-4 ">
            <div class="flex-grow-1 ">
                <a class="text-white" href="{{'/'}}">Already have an account?</a>
            </div>
            <button class="btn btn-primary px-5 border border-secondary">Register</button>
        </div>
        </form>
    </div>
@endsection

