@extends('layouts.admin')

@section('content')
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2>📍 Luoghi del viaggio: {{ $travel->title }} a {{ $travel->destination_city }}, {{ $travel->destination_country }}</h2>
            <a href="{{ route('admin.travels.places.create', $travel->id) }}" class="btn btn-success">
                + Aggiungi luogo
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

        @if($places->isEmpty())
            <div class="alert alert-info">
                Nessun luogo ancora inserito per questo viaggio.
            </div>
        @else
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Posizione</th>
                        <th>Immagine</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($places as $place)
                        <tr>
                            <td>{{ $place->name }}</td>
                            <td>{{ $place->type }}</td>
                            <td>
                                @if ($place->latitude && $place->longitude)
                                    <small class="text-muted">{{ $place->latitude }}, {{ $place->longitude }}</small>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if ($place->image)
                                    <img src="{{ asset('storage/' . $place->image) }}" alt="{{ $place->name }}" width="60">
                                @else
                                    <span class="text-muted">Nessuna</span>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.travels.places.show', [$travel->id, $place->id]) }}" class="btn btn-sm btn-info">
                                    Visualizza
                                </a>
                                <a href="{{ route('admin.travels.places.edit', [$travel->id, $place->id]) }}" class="btn btn-sm btn-warning">
                                    ✏️ Modifica
                                </a>

                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $travel->id }}-{{ $place->id }}">
                                    🗑️ Elimina
                                </button>
    
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModalLabel{{ $travel->id }}-{{ $place->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $travel->id }}-{{ $place->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $travel->id }}-{{ $place->id }}">Elimina il luogo</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Vuoi eliminare il luogo <strong>{{ $place->name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route("admin.travels.places.destroy", [$travel->id, $place->id]) }}" method="POST">
                                                    @csrf
                    
                                                    @method("DELETE")
                                                    <input type="submit" value="Elimina" class="btn btn-danger">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>      
@endsection