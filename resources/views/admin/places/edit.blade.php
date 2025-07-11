@extends('layouts.admin')

@section('content')
    <div class="container py-3">
        <div class="card travel-card">
            <div class="card-body">
                <h1 class="card-title mb-4">Modifica Luogo: {{ $place->name }}</h1>

                <form action="{{ route('admin.travels.places.update', [$travel->id, $place->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
        
                    <div class="mb-4">
                        <label for="name" class="form-label">Nome del luogo</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="form-control" 
                            value="{{ $place->name }}">
                    </div>

                    <div class="mb-4">
                        <label for="type" class="form-label">Tipo</label>
                        <select name="type" id="type" class="form-select">
                            <option value=""> Seleziona un tipo</option>
                            @foreach($placeTypes as $type)
                                <option value="{{ $type }}" {{ $place->type === $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="mb-4">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" rows="5" class="form-control">{{ $place->description }}</textarea>
                    </div>
        
                    <div class="row mb-4">
                        <div class="col">
                            <label for="latitude" class="form-label">Latitudine</label>
                            <input 
                                type="text" 
                                name="latitude" 
                                id="latitude" 
                                class="form-control" 
                                value="{{ $place->latitude }}">
                        </div>

                        <div class="col">
                            <label for="longitude" class="form-label">Longitudine</label>
                            <input 
                                type="text" 
                                name="longitude" 
                                id="longitude" 
                                class="form-control" 
                                value="{{ $place->longitude }}">
                        </div>

                        <small class="text-white">
                            Puoi trovare le coordinate su
                            <a href="https://www.google.com/maps" target="_blank" class="text-decoration-none">
                                Google Maps
                            </a>: clicca col tasto destro su un punto → "Che cosa c'è qui?" → copia i numeri sopra la posizione e incollali nei campi corretti.
                        </small>
                    </div>
        
                    <div class="mb-4">
                        <label for="image" class="form-label">Immagine</label>
                        <div class="d-flex align-items-center gap-3">
                            <input 
                                type="file" 
                                name="image" 
                                id="image" 
                                class="form-control">

                                @if($place->image)
                                    <img src="{{ asset('storage/' . $place->image) }}" alt="Immagine di {{ $place->name }}" class="img-fluid rounded" style="width: 100px;">
                                @endif
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-outline-warning">Modifica Luogo</button>
                        <a href="{{ route('admin.travels.places.index', $travel->id) }}" class="btn btn-outline-secondary">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection