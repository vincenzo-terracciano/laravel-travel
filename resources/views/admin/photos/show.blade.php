@extends('layouts.admin')

@section('content')
    <div class="container py-3">
        <div class="card travel-card">
            <img src="{{ asset('storage/' . $photo->image) }}" class="photo" alt="{{ $photo->caption }}">
    
            <div class="card-body">
                <h5 class="card-title mb-4">Foto del viaggio: {{ $travel->title }}</h5>
                
                @if($photo->caption)
                    <p class="card-text">
                        <strong>Didascalia:</strong> {{ $photo->caption }}
                    </p>
                @endif
    
                <p class="card-text">
                    <strong>Destinazione:</strong> {{ $travel->destination_city }}, {{ $travel->destination_country }}
                </p>
    
                <p class="card-text">
                    <strong>Caricata il:</strong> {{ $photo->created_at->format('d/m/Y H:i') }}
                </p>

                <div class="mt-5 d-flex gap-3">
                    <a href="{{ route('admin.travels.photos.index', $travel->id) }}" class="btn btn-outline-primary">
                        ← Torna alla galleria
                    </a>
                    <a href="{{ route('admin.travels.photos.edit', [$travel, $photo]) }}" class="btn btn-outline-warning">
                        Modifica Foto
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection