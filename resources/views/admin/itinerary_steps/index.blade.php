@extends('layouts.admin')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h5>
            Itinerario per il viaggio: {{ $travel->title }} a {{ $travel->destination_city }}, {{ $travel->destination_country }}
        </h5>
        <a href="{{ route('admin.travels.itinerary_steps.create', $travel->id) }}" class="btn btn-success">+ Aggiungi Step</a>
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

    @if($steps->isEmpty())
        <div class="alert alert-info">
            Nessuno step inserito per questo viaggio.
        </div>
    @else
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Giorno</th>
                    <th>Titolo</th>
                    <th>Orario</th>
                    <th>Tipo Attività</th>
                    <th>Luogo</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($steps as $step)
                    <tr>
                        <td>Giorno {{ $step->day_number }}</td>
                        <td>{{ $step->title }}</td>
                        <td>
                            {{ $step->estimated_time ? \Carbon\Carbon::parse($step->estimated_time)->format('H:i') : '-' }}
                        </td>
                        <td>
                            @if($step->activity_type)
                                {{ $step->activity_type }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($step->place)
                                {{ $step->place->name }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{ route('admin.travels.itinerary_steps.show', [$travel->id, $step->id]) }}" class="btn btn-sm btn-info">Visualizza</a>
                                <a href="{{ route('admin.travels.itinerary_steps.edit', [$travel->id, $step->id]) }}" class="btn btn-sm btn-warning">Modifica</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $travel->id }}-{{ $step->id }}">
                                    Elimina
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModalLabel{{ $travel->id }}-{{ $step->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $travel->id }}-{{ $step->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $travel->id }}-{{ $step->id }}">Elimina lo step</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Vuoi eliminare lo step <strong>{{ $step->title }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route("admin.travels.itinerary_steps.destroy", [$travel->id, $step->id]) }}" method="POST">
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
