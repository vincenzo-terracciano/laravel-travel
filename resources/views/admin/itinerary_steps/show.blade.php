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
        @if($itinerary_step->image)
            <img 
                src="{{ asset('storage/' . $itinerary_step->image) }}" 
                alt="Immagine step {{ $itinerary_step->title }}"
                class="card-img-top"
                style="max-height: 400px; object-fit: cover;">
        @endif

        <div class="card-body">
            <h2 class="card-title mb-3">
                Giorno {{ $itinerary_step->day_number }} - {{ $itinerary_step->title }}
            </h2>

            <p class="card-text lead">
                {{ $itinerary_step->description }}
            </p>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Orario previsto:</strong>
                    {{ $itinerary_step->estimated_time ? \Carbon\Carbon::parse($itinerary_step->estimated_time)->format('H:i') : '-' }}
                </li>
                <li class="list-group-item">
                    <strong>Tipo attività:</strong>
                    @if($itinerary_step->activity_type)
                        <span class="badge bg-info text-dark">{{ $itinerary_step->activity_type }}</span>
                    @else
                        <span>-</span>
                    @endif
                </li>
                <li class="list-group-item">
                    <strong>Luogo:</strong>
                    @if($itinerary_step->place)
                        <span>{{ $itinerary_step->place->name }}</span>
                    @else
                        <span>-</span>
                    @endif
                </li>
            </ul>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('admin.travels.itinerary_steps.index', $travel->id) }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i> Torna all'itinerario
                    </a>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('admin.travels.itinerary_steps.edit', [$travel, $itinerary_step]) }}" class="btn btn-outline-warning">
                        <i class="fas fa-pen me-1"></i> Modifica
                    </a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $travel->id }}-{{ $itinerary_step->id }}">
                        <i class="fas fa-trash me-1"></i> Elimina
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModalLabel{{ $travel->id }}-{{ $itinerary_step->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $travel->id }}-{{ $itinerary_step->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $travel->id }}-{{ $itinerary_step->id }}">Elimina lo step itinerario</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Vuoi eliminare lo step itinerario <strong>{{ $itinerary_step->title }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route("admin.travels.itinerary_steps.destroy", [$travel->id, $itinerary_step->id]) }}" method="POST">
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
