@extends('base')

@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">IPT Security System</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ml-auto">
                <div class="mt-2">Dashboard</div>

                <form action="{{ url('/logout') }}" method="POST">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-link nav-link">Logout</button>
                </form>

            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <p>Hi</p>
    </div>
@endsection
