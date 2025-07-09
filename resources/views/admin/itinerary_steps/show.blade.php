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
                    {{ \Carbon\Carbon::parse($itinerary_step->estimated_time)->format('H:i') ?? '-' }}
                </li>
                <li class="list-group-item">
                    <strong>Tipo attività:</strong>
                    @if($itinerary_step->activity_type)
                        <span class="badge bg-info text-dark">{{ $itinerary_step->activity_type }}</span>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </li>
                <li class="list-group-item">
                    <strong>Luogo:</strong>
                    @if($itinerary_step->place)
                        <span>{{ $itinerary_step->place->name }}</span>
                    @else
                        <span class="text-muted">—</span>
                    @endif
                </li>
            </ul>

            <div class="mt-4 d-flex gap-3">
                <a href="{{ route('admin.travels.itinerary_steps.index', $travel->id) }}" class="btn btn-outline-primary">
                    ← Torna all'itinerario
                </a>
                <a href="{{ route('admin.travels.itinerary_steps.edit', [$travel, $itinerary_step]) }}" class="btn btn-outline-warning">
                    ✏️ Modifica Step
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
