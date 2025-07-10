@extends('layouts.admin')

@section('content')
    <div class="container py-3">
        <div class="card travel-card">
            <div class="card-body">
                <h2 class="card-title mb-4">Aggiungi una nuova foto per: {{ $travel->title }} a {{ $travel->destination_city }}, {{ $travel->destination_country }}</h2>

                <form action="{{ route('admin.travels.photos.store', $travel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
            
                    <div class="mb-4">
                        <label for="image" class="form-label">Immagine <span class="text-danger">*</span></label>
                        <input 
                            type="file" 
                            class="form-control" 
                            id="image" 
                            name="image" required>
                    </div>
            
                    <div class="mb-4">
                        <label for="caption" class="form-label">Didascalia</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="caption" 
                        name="caption">
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-outline-primary">Salva</button>
                        <a href="{{ route('admin.travels.photos.index', $travel->id) }}" class="btn btn-outline-secondary">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection