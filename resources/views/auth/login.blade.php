@extends('base')

@section('content')
    <div class="container col-md-6 offset-md-3 mt-5 border border-black rounded shadow shadow-lg" style="background-color: gray">

        @if(session('message'))
            <div class="alert alert-success mt-2">{{session('message')}}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-2">{{session('error')}}</div>
        @endif

        <h1 class="text-center text-white mt-2">Welcome</h1>
        <form action="/dashboard" method="POST">
        {{csrf_field()}}

        <div class="form-group mb-3 ">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control border border-black">
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control border border-black">
        </div>
        <div class="d-flex mb-4 ">
            <div class="flex-grow-1 ">
                <a class="text-white" href="{{'/register'}}">Sign Up (Una lang mo)</a>
            </div>
            <button class="btn btn-primary px-5 border border-secondary">Login</button>
        </div>
        </form>
    </div>
@endsection

