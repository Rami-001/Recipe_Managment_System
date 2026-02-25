@extends('Layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Recipe List</h1>
        <a href="{{ route('recipes.create') }}" class="btn btn-primary">Add New Recipe</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4">Name</th>
                        <th>Description</th>
                        <th class="text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td class="px-4 font-weight-bold">{{ $recipe->name }}</td>
                            <td>{{ Str::limit($recipe->description, 100) }}</td>
                            <td class="text-end px-4">
                                <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-sm btn-info text-white">View</a>
                                <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
