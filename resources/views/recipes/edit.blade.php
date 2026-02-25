@extends('Layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 text-start">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Edit Recipe: {{ $recipe->name }}</h1>
                <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Back to List</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger shadow-sm mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label font-weight-bold">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $recipe->name) }}" placeholder="Enter recipe name">
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label font-weight-bold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Briefly describe the dish">{{ old('description', $recipe->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="ingredients" class="form-label font-weight-bold">Ingredients</label>
                            <textarea class="form-control" id="ingredients" name="ingredients" rows="5" placeholder="List ingredients (one per line)">{{ old('ingredients', $recipe->ingredients) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="instructions" class="form-label font-weight-bold">Instructions</label>
                            <textarea class="form-control" id="instructions" name="instructions" rows="5" placeholder="Step by step instructions">{{ old('instructions', $recipe->instructions) }}</textarea>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg">Update Recipe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
