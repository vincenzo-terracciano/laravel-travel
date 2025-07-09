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
        <div class="card-body">
            <div class="d-flex align-items-center gap-3 mb-4">
                <h1 class="card-title m-0 badge badge-title" style="background-color: {{ $tag->color }};">
                    {{ $tag->name }}
                </h1>
            </div>

            <hr>

            @if ($tag->travels->isNotEmpty())
                <h4 class="mb-3">Viaggi con questo tag:</h4>
                <ul class="list-group">
                    @foreach ($tag->travels as $travel)
                        <li class="list-group-item">
                            <a href="{{ route('admin.travels.show', $travel->id) }}" class="text-white text-decoration-none travel-title-link">
                                {{ $travel->title }}, {{ $travel->destination_city }} ({{ $travel->destination_country }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="mt-3">
                    Nessun viaggio associato aquesto tag.
                </p>
            @endif

            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-primary">← Torna alla lista Tags</a>
                <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-outline-warning">Modifica Tag</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $tag->id }}">
                    Elimina Categoria
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModalLabel{{ $tag->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $tag->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $tag->id }}">Elimina il tag</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Vuoi eliminare il tag <strong>{{ $tag->name }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{ route("admin.tags.destroy", $tag->id) }}" method="POST">
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
