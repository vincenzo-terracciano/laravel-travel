@extends('layouts.admin')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>Lista Tags</h1>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-success">+ Nuovo Tag</a>
    </div>

    @if (session('success'))
    <div id="alert-success" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('deleted'))
    <div id="alert-deleted" class="alert alert-danger">
        {{ session('deleted') }}
    </div>
    @endif

    {{-- script per visualizzare il messaggio di successo ed eliminazione per 4 secondi --}}
    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-success');
            if(alert) alert.style.display = 'none';

            const alertDeleted = document.getElementById('alert-deleted');
            if (alertDeleted) alertDeleted.style.display = 'none';
        }, 4000);
    </script>

    @if($tags->isEmpty())
        <div class="alert alert-info">
            Nessun tag presente al momento.
        </div>
    @else
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Colore</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <span class="badge fs-7" style="background-color: {{ $tag->color }}; color: white;">
                                {{ $tag->color }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-sm btn-info">Visualizza</a>
                                <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-sm btn-warning">Modifica</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $tag->id }}">
                                    Elimina
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
