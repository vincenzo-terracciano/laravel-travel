@extends('layouts.admin')

@section('content')
    <div class="container py-3">
        <div class="card travel-card">
            <div class="card-body">
                <h2 class="card-title mb-4">Aggiungi un nuovo luogo per il viaggio: {{ $travel->title }} a {{ $travel->destination_city }}, {{ $travel->destination_country }}</h2>

                <form action="{{ route('admin.travels.places.store', $travel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    <div class="mb-4">
                        <label for="name" class="form-label">Nome del luogo</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="form-control" required>
                    </div>
        
                    <div class="mb-4">
                        <label for="type" class="form-label">Tipo di luogo</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="" selected>Seleziona un tipo</option>
                            @foreach ($placeTypes as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="4" 
                            class="form-control">
                        </textarea>
                    </div>
        
                    <div class="row mb-4">
                        <div class="col">
                            <label for="latitude" class="form-label">Latitudine</label>
                            <input 
                                type="text" 
                                name="latitude" 
                                id="latitude" 
                                class="form-control" 
                                placeholder="Es. 45.4642" required>
                        </div>

                        <div class="col">
                            <label for="longitude" class="form-label">Longitudine</label>
                            <input 
                                type="text" 
                                name="longitude" 
                                id="longitude" 
                                class="form-control" 
                                placeholder="Es. 9.1900" required>
                        </div>

                        <small class="text-white">
                            Puoi trovare le coordinate su
                            <a href="https://www.google.com/maps" target="_blank" class="text-decoration-none">
                                Google Maps
                            </a>: clicca col tasto destro su un punto → "Che cosa c'è qui?" → copia i numeri sopra la posizione e incollali nei campi corretti.
                        </small>
                    </div>
        
        
                    <div class="mb-4">
                        <label for="image" class="form-label">Immagine del luogo</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-outline-primary">Salva</button>
                        <a href="{{ route('admin.travels.places.index', $travel->id) }}" class="btn btn-outline-secondary">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection