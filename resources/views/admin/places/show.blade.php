@extends('layouts.admin')

@section('content')
    <div class="container py-3">

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
            @if($place->image)
                <img 
                    src="{{ asset('storage/' . $place->image) }}"
                    class="card-img-top" 
                    alt="Foto del luogo {{ $place->name }}"
                    style="max-height: 400px; object-fit: cover;">
            @endif

            
            <div class="card-body">
                <h2 class="card-title mb-2">{{ $place->name }}</h2>

                <span class="badge bg-info text-dark mb-4 fs-8">{{ $place->type }}</span>

                <p class="card-text mb-4">{{ $travel->description }}</p>

                <div class="mb-5 p-3 rounded border">
                    <h6 class="">🌍 Coordinate geografiche</h6>
                    <p class="mb-2">
                        <strong>Latitudine:</strong> {{ $place->latitude }}
                    </p>
                    <p class="mb-0">
                        <strong>Longitudine:</strong> {{ $place->longitude }}
                    </p>

                    @if($place->latitude && $place->longitude)
                        <div class="mt-4">
                            <iframe
                            width="100%"
                            height="400"
                            frameborder="0"
                            style="border:0; border-radius: 10px;"
                            src="https://www.google.com/maps?q={{ $place->latitude }},{{ $place->longitude }}&output=embed"
                            allowfullscreen>
                            </iframe>

                            <a href="https://www.google.com/maps/search/?api=1&query={{ $place->latitude }},{{ $place->longitude }}" 
                                target="_blank"
                                class="btn btn-outline-success mt-3">
                                🌍 Apri su Google Maps
                            </a>
                        </div>
                    @endif
                </div>

                <div class="buttons d-flex align-items-center gap-3">
                    <a href="{{ route('admin.travels.places.index', $travel->id) }}" class="btn btn-outline-primary">
                        ← Torna ai luoghi
                    </a>
                    <a href="{{ route('admin.travels.places.edit', [$travel->id, $place->id]) }}" class="btn btn-outline-warning">
                        ✏️ Modifica
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection