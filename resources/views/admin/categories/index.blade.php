@extends('layouts.admin')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>Lista Categorie</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">+ Nuova Categoria</a>
    </div>

    @if (session('success'))
    <div id="alert-success" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- script per visualizzare il messaggio di successo per 4 secondi --}}
    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-success');
            if(alert) alert.style.display = 'none';
        }, 4000);
    </script>

    @if($categories->isEmpty())
        <div class="alert alert-info">
            Nessuna categoria presente al momento.
        </div>
    @else
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Icona</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->icon }}</td>
                        <td style="d-flex justify-content-center min-width: 180px; height: 100%;">
                            <div class="d-flex align-items-center gap-2 h-100">
                                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-sm btn-info">Visualizza</a>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Modifica</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $category->id }}">
                                    Elimina
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModalLabel{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $category->id }}">Elimina il viaggio</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Vuoi eliminare la categoria <strong>{{ $category->name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route("admin.categories.destroy", $category->id) }}" method="POST">
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
