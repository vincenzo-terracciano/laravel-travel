@extends('layouts.admin')

@section('content')
    <div class="container py-3">
        <div class="card travel-card">
            <div class="card-body">
                <h2 class="card-title mb-4">Modifica foto del viaggio: {{ $travel->title }} a {{ $travel->destination_city }}, {{ $travel->destination_country }}</h2>

                <form action="{{ route('admin.travels.photos.update', [$travel->id, $photo->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')

                    <div class="mb-4">
                        <label for="image" class="form-label">Immagine</label>
                        <div class="d-flex align-items-center gap-3">
                            <input 
                                type="file" 
                                name="image" 
                                id="image" 
                                class="form-control">

                                @if($photo->image)
                                    <img src="{{ asset('storage/' . $photo->image) }}" alt="Immagine del viaggio {{ $travel->title }}" class="img-fluid rounded" style="width: 100px;">
                                @endif
                        </div>
                    </div>
            
                    <div class="mb-4">
                        <label for="caption" class="form-label">Didascalia</label>
                        <input 
                            type="text" 
                            class="form-control"
                            id="caption" 
                            name="caption" 
                            value="{{ $photo->caption }}">
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-outline-warning">Modifica Foto</button>
                        <a href="{{ route('admin.travels.photos.index', $travel->id) }}" class="btn btn-outline-secondary">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection