@extends('base')

@section('content')
    
    <div class="container py-3">
        <div class="d-flex justify-content-between">
            <h1>Fruits List</h1>
            <a href="{{ route('fruits.create') }}" class="btn btn-primary mb-3 mt-2">Add New Fruit</a>
        </div>
    
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <table class="table table-striped table-bordered" style="border-spacing: 0.5rem;">
            <thead class="bg-gray-100">
                <tr>
                    <th class="bg-gray-100 text-white">Name</th>
                    <th class="bg-gray-100 text-white">Description</th>
                    <th class="bg-gray-100 text-white">Classification</th>
                    <th class="bg-gray-100 text-white">Stocks</th>
                    @role('admin')
                    <th class="bg-gray-100 text-white text-center">Actions</th>
                    <th class="bg-gray-100 text-white text-center">Restock</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach($fruits as $fruit)
                    <tr class="bg-slate-200">
                        <td class="bg-slate-200 text-white">{{ $fruit->fruit_name }}</td>
                        <td class="bg-slate-200 text-white">{{ $fruit->description }}</td>
                        <td class="bg-slate-200 text-white">{{ $fruit->classification }}</td>
                        <td class="bg-slate-200 text-white">{{ $fruit->stocks }}</td>
                        @role('admin')
                        <td class="bg-slate-200 text-center">
                            {{-- <a href="{{ route('fruits.show', $fruit->id) }}" class="btn btn-info">View</a> --}}
                            <a href="{{ route('fruits.edit', $fruit->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('fruits.destroy', $fruit->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            
                        </td>
                        <td class="bg-slate-200 text-center">
                            {{-- Restock button --}}
                            <form action="{{ route('fruits.restock', $fruit->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Restock</button>
                            </form>
                        </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

    <style scoped>

        
        h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .btn {
            margin-right: 10px;
        }
        
        .alert {
            margin-bottom: 20px;
        }
        
        .bg-gray-100 {
            background-color: rgb(91, 91, 91) !important;
        }
        
        .bg-slate-200 {
            background-color: #60778f !important;
        }
    </style>
