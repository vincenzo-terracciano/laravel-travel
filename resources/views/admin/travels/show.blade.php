@extends('layouts.admin')

@section('content')
<div class="container py-4">

    @if (session('success'))
    <div id="alert-warning" class="alert alert-warning">
        {{ session('success') }}
    </div>

    {{-- script per visualizzare il messaggio di successo per 4 secondi --}}
    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-warning');
            if (alert) alert.style.display = 'none';
        }, 4000);
    </script>
    @endif

    <div class="card travel-card">
        @if($travel->cover_image)
        <img 
            src="{{ asset('storage/' . $travel->cover_image) }}"
            class="card-img-top" 
            alt="Copertina di {{ $travel->title }}"
            style="max-height: 600px; object-fit: cover;">
        @endif

        <div class="card-body">
            <h1 class="card-title mb-3">{{ $travel->title }}</h1>

            <div class="category mb-3">
                @if($travel->category)
                    <a href="{{ route('admin.categories.show', $travel->category->id) }}" class="text-decoration-none">
                        <i class="{{ $travel->category->icon }} me-2"></i> 
                        {{ $travel->category->name }}
                    </a>
                @else
                    <span>Categoria non definita</span>
                @endif

            </div>

            <div class="mb-3 d-flex flex-wrap gap-2">
                @forelse ($travel->tags as $tag)
                    <a href="{{ route('admin.tags.show', $tag->id) }}" class="badge badge-hover rounded-pill text-decoration-none me-1" style="background-color: {{ $tag->color }}">{{ $tag->name }}</a>

                    @empty
                        Nessun tag definito
                @endforelse
            </div>

            <p class="card-text mb-3">{{ $travel->description }}</p>

            <ul class="mb-4">
                <li class="list-group-item">
                    <strong>Destinazione:</strong> {{ $travel->destination_city }}, {{ $travel->destination_country }}
                </li>
                <li class="list-group-item">
                    <strong>Periodo:</strong> 
                    {{ \Carbon\Carbon::parse($travel->departure_date)->format('d M Y') }} - 
                    {{ \Carbon\Carbon::parse($travel->return_date)->format('d M Y') }}
                </li>
                <li class="list-group-item">
                    <strong>Pubblicato:</strong> 
                    @if($travel->is_published)
                        <span class="badge bg-success">
                            <i class="fas fa-check"></i>
                        </span>
                    @else
                        <span class="badge bg-danger">
                            <i class="fas fa-times"></i>
                        </span>
                    @endif
                </li>
            </ul>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('admin.travels.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i> Torna alla lista dei Viaggi
                    </a>
                
                    {{-- Dropdown con azioni extra --}}
                    <div class="dropdown">
                        <button class="btn btn-outline-info dropdown-toggle" type="button" id="actionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v me-1"></i> Dettagli
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="actionsDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.travels.itinerary_steps.index', $travel->id) }}">
                                    <i class="fas fa-route me-2 text-info"></i> Itinerario
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.travels.packing_items.index', $travel->id) }}">
                                    <i class="fas fa-suitcase-rolling me-2 text-secondary"></i> Lista Valigia
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.travels.places.index', $travel->id) }}">
                                    <i class="fas fa-map-marker-alt me-2 text-danger"></i> Luoghi da visitare
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.travels.photos.index', $travel->id) }}">
                                    <i class="fas fa-image me-2 text-success"></i> Foto del viaggio
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('admin.travels.edit', $travel->id) }}" class="btn btn-outline-warning">
                        <i class="fas fa-pen me-1"></i> Modifica Viaggio
                    </a>

                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $travel->id }}">
                        <i class="fas fa-trash me-1"></i> Elimina Viaggio
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModalLabel{{ $travel->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $travel->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $travel->id }}">Elimina il viaggio</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Vuoi eliminare il viaggio <strong>{{ $travel->title }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route("admin.travels.destroy", $travel->id) }}" method="POST">
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
