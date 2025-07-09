@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card travel-card">
        <div class="card-body">
            <h1 class="card-title mb-4">Modifica tag: {{ $tag->name }}</h1>

            <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                @csrf

                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label">Nome tag</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        value="{{ $tag->name }}" required>
                </div>

                <div class="mb-4">
                    <label for="color" class="form-label">Colore</label>
                    <input 
                        type="color" 
                        name="color" 
                        id="color" 
                        class="form-control form-control-color" 
                        value="{{ $tag->color }}" 
                        title="Scegli un colore" required>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-secondary">← Annulla</a>
                    <button type="submit" class="btn btn-outline-warning">Modifica Tag</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
