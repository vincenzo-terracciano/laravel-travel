@extends('layouts.admin')

@section('content')
    <div class="container py-3">
        <h4 class="text-center mb-4">
            Foto per il viaggio: {{ $travel->title }} a {{ $travel->destination_city }}, {{ $travel->destination_country }}
        </h4>
        
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <a href="{{ route('admin.travels.show', $travel->id) }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-1"></i> Torna al Viaggio
            </a>
            <a href="{{ route('admin.travels.photos.create', $travel->id) }}" class="btn btn-outline-success">
                <i class="fas fa-plus me-1"></i> Aggiungi Foto
            </a>
        </div>

        {{-- messaggi flash --}}
        @if(session('success'))
            <div class="alert alert-success" id="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('deleted'))
            <div class="alert alert-danger" id="alert-deleted">
                {{ session('deleted') }}
            </div>
        @endif

        {{-- script per visualizzare il messaggio di successo ed eliminazione per 4 secondi --}}
        <script>
            setTimeout(() => {
                const successAlert = document.getElementById('alert-success');
                if(successAlert) successAlert.style.display = 'none';

                const deletedAlert = document.getElementById('alert-deleted');
                if(deletedAlert) deletedAlert.style.display = 'none';
            }, 4000);
        </script>

        <div class="row row-cols-1 row-cols-md-3 g-4">

            @forelse($photos as $photo)
                <div class="col">
                    <div class="card travel-card h-100 d-flex flex-column">
                        <img src="{{ asset('storage/' . $photo->image) }}" class="card-img-top photo-img mb-4" alt="{{ $photo->caption }}">
                        <div class="card-body d-flex flex-grow-1 flex-column justify-content-between">
                            @if($photo->caption)
                                <p class="card-text">{{ $photo->caption }}</p>
                            @endif

                            <div class="d-flex align-items-center gap-3">
                                <a href="{{ route('admin.travels.photos.show', [$travel->id, $photo->id]) }}" class="btn btn-sm btn-info">
                                    Visualizza
                                </a>
                                <a href="{{ route('admin.travels.photos.edit', [$travel->id, $photo->id]) }}" class="btn btn-sm btn-warning">
                                    Modifica
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $travel->id }}-{{ $photo->id }}">
                                    Elimina
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
            @empty
                <div class="alert alert-info">
                    Nessuna foto ancora inserita per questo viaggio.
                </div>
            @endforelse
        </div>

        @if ($photos->hasPages())
            <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                {{ $photos->links() }}

                <p class="text-muted mt-2">
                    Mostrate {{ $photos->lastItem() }} di {{ $photos->total() }} foto
                </p>
            </div>
        @endif
    </div>
@endsection