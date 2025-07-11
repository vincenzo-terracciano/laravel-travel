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

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('admin.travels.photos.index', $travel->id) }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-1"></i> Torna alla galleria
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('admin.travels.photos.edit', [$travel, $photo]) }}" class="btn btn-outline-warning">
                            <i class="fas fa-pen me-1"></i> Modifica
                        </a>

                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $travel->id }}-{{ $photo->id }}">
                            <i class="fas fa-trash me-1"></i> Elimina
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModalLabel{{ $travel->id }}-{{ $photo->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $travel->id }}-{{ $photo->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $travel->id }}-{{ $photo->id }}">Elimina la foto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Vuoi eliminare la foto?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route("admin.travels.photos.destroy", [$travel->id, $photo->id]) }}" method="POST">
                                            @csrf
            
                                            @method("DELETE")
                                            <input type="submit" value="Elimina" class="btn btn-danger">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection