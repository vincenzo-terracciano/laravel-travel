@extends('layouts.admin')

@section('content')
<div class="container py-4">

    @if (session('success'))
    <div id="alert-warning" class="alert alert-warning">
        {{ session('success') }}
    </div>

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
            style="max-height: 400px; object-fit: cover;">
        @endif

        <div class="card-body">
            <h1 class="card-title mb-3">{{ $travel->title }}</h1>

            <div class="mb-3">
                @if($travel->category)
                    <i class="{{ $travel->category->icon }} me-2"></i> 
                    {{ $travel->category->name }}
                @else
                    <span>Categoria non definita</span>
                @endif
            </div>

            <div class="mb-3 d-flex flex-wrap gap-2">
                @foreach ($travel->tags as $tag)
                    <span class="badge rounded-pill me-1" style="background-color: {{ $tag->color }}">{{ $tag->name }}</span>
                @endforeach
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

            <div class="buttons d-flex align-items-center gap-3">
                <a href="{{ route('admin.travels.index') }}" class="btn btn-outline-primary">
                    ← Torna alla lista viaggi
                </a>
                <a href="{{ route('admin.travels.edit', $travel->id) }}" class="btn btn-outline-warning">
                    ← Modifica viaggio
                </a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $travel->id }}">
                    Elimina
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
@endsection
