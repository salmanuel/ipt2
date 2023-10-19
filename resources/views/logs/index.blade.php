@extends('base')

@section('content')
    <!-- Navbar -->
    

    <div class="container">
        <h1>Logs</h1>
    
        {{-- @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}
    
        <table class="table">
            <thead>
                <tr>
                    <th>Log</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->log_entry }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
