@extends('layouts.admin')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>Lista Viaggi</h1>
        <a href="{{ route('admin.travels.create') }}" class="btn btn-success">+ Nuovo Viaggio</a>
    </div>

    @if($travels->isEmpty())
        <div class="alert alert-info">
            Nessun viaggio presente al momento.
        </div>
    @else
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Titolo</th>
                    <th>Destinazione</th>
                    <th>Data Partenza</th>
                    <th>Data Ritorno</th>
                    <th>Categoria</th>
                    <th>Stato</th>
                    <th>Immagine di copertina</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($travels as $travel)
                    <tr>
                        <td>{{ $travel->title }}</td>
                        <td>{{ $travel->destination_city }}, {{ $travel->destination_country }}</td>
                        <td>{{ $travel->departure_date }}</td>
                        <td>{{ $travel->return_date }}</td>
                        <td>
                            {{ $travel->category?->name ?? 'Nessuna' }}
                        </td>
                        <td>
                            @if ($travel->is_published)
                                <span class="badge text-bg-success">Pubblicato</span>
                            @else
                                <span class="badge text-bg-secondary">Bozza</span>
                            @endif
                        </td>
                        <td>
                            @if ($travel->cover_image)
                                <img src="{{ $travel->cover_image }}" alt="{{ $travel->title }}" width="100">
                            @else
                                <em>Nessuna immagine</em>
                            @endif
                        </td>
                        <td style="min-width: 180px; height: 100%;">
                            <div class="d-flex align-items-center gap-2 h-100">
                                <a href="{{ route('admin.travels.show', $travel->id) }}" class="btn btn-sm btn-info">Visualizza</a>
                                <a href="{{ route('admin.travels.edit', $travel->id) }}" class="btn btn-sm btn-warning">Modifica</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $travel->id }}">
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
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
