<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IPT 02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="ms-2">
            <a class="navbar-brand" href="#">Finals</a>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto text-dark">
                @if (auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
                {{-- @php
                    $user = auth()->user();
                @endphp --}}
                @role('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logs') }}">Logs</a>
                </li>
                @endrole

                <form action="{{ url('/logout') }}" method="POST">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-link nav-link">Logout</button>
                </form>
                @endif

            </ul>
        </div>
    </nav>
    <div class="bg-secondary" style="min-height: 100vh">
        <div >
            @yield('content')
        </div>
    </div>
</body>
</html>


