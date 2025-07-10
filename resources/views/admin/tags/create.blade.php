@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card travel-card">
        <div class="card-body">
            <h1 class="card-title mb-4">Crea un nuovo tag</h1>

            <form action="{{ route('admin.tags.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label">Nome tag</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        required>
                </div>

                <div class="mb-4">
                    <label for="color" class="form-label">Colore</label>
                    <input 
                        type="color" 
                        name="color" 
                        id="color" 
                        class="form-control form-control-color"
                        title="Scegli un colore"
                        required>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-outline-primary">Crea Tag</button>
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-secondary">Annulla</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
