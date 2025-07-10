@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card travel-card">
        <div class="card-body">
            <h1 class="card-title mb-4">Modifica categoria: {{ $category->name }}</h1>

            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf

                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label">Nome categoria</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        value="{{ $category->name }}" required>
                </div>

                <div class="mb-4">
                    <label for="icon" class="form-label">Icona (classi FontAwesome)</label>
                    <input 
                        type="text" 
                        name="icon" 
                        id="icon" 
                        class="form-control" 
                        value="{{ $category->icon }}" required>
                    <div class="form-text text-white">
                        Inserisci le classi FontAwesome, es: <code>fa-solid fa-mountain</code>  
                        <br>Consulta: <a href="https://fontawesome.com/icons" target="_blank" class="text-decoration-none">FontAwesome Icons</a>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-outline-warning">Modifica Categoria</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Annulla</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
