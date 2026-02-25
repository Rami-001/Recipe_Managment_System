@extends('Layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 text-start">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>{{ $recipe->name }}</h1>
                <div>
                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title text-muted">Description</h5>
                    <p class="card-text lead">{{ $recipe->description }}</p>
                    
                    <hr>

                    <h5 class="card-title text-muted">Ingredients</h5>
                    <p class="card-text" style="white-space: pre-line;">{{ $recipe->ingredients }}</p>

                    <hr>

                    <h5 class="card-title text-muted">Instructions</h5>
                    <p class="card-text" style="white-space: pre-line;">{{ $recipe->instructions }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
