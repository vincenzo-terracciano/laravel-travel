@extends('layouts.admin')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h5>Valigia per il viaggio: {{ $travel->title }} a {{ $travel->destination_city }}, {{ $travel->destination_country }}</h5>
        <a href="{{ route('admin.travels.packing_items.create', $travel->id) }}" class="btn btn-success">
            + Aggiungi oggetto
        </a>
    </div>

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

    <script>
        setTimeout(() => {
            const successAlert = document.getElementById('alert-success');
            if(successAlert) successAlert.style.display = 'none';

            const deletedAlert = document.getElementById('alert-deleted');
            if(deletedAlert) deletedAlert.style.display = 'none';
        }, 4000);
    </script>

    @if($items->isEmpty())
        <div class="alert alert-info">
            Nessun oggetto aggiunto alla valigia.
        </div>
    @else
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Oggetto</th>
                    <th>Obbligatorio</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>
                            @if($item->is_mandatory)
                                <span class="badge bg-danger">Sì</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center gap-2">
                            <a href="{{ route('admin.travels.packing_items.edit', [$travel->id, $item->id]) }}" class="btn btn-sm btn-warning">Modifica</a>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $travel->id }}-{{ $item->id }}">
                                Elimina
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModalLabel{{ $travel->id }}-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $travel->id }}-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel{{ $travel->id }}-{{ $item->id }}">Elimina l'oggetto</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Vuoi eliminare l'oggetto <strong>{{ $item->item_name }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route("admin.travels.packing_items.destroy", [$travel->id, $item->id]) }}" method="POST">
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
