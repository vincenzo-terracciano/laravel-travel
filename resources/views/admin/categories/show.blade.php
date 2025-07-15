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
                <i class="{{ $category->icon }} fs-1 text-primary"></i>
                <h1 class="card-title m-0">{{ $category->name }}</h1>
            </div>

            <hr>

            @if ($category->travels->isNotEmpty())
                <h4 class="mb-3">Viaggi in questa categoria:</h4>
                <ul class="list-group">
                    @foreach ($category->travels as $travel)
                        <li class="list-group-item">
                            <a href="{{ route('admin.travels.show', $travel->id) }}" class="text-white text-decoration-none travel-title-link">
                                {{ $travel->title }}, {{ $travel->destination_city }} ({{ $travel->destination_country }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="mt-3">
                    Nessun viaggio associato a questa categoria.
                </p>
            @endif

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i> Torna alla lista Categorie
                    </a>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline-warning">
                        <i class="fas fa-pen me-1"></i> Modifica Categoria
                    </a>

                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $category->id }}">
                        <i class="fas fa-trash me-1"></i> Elimina Categoria
                    </button>
    
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModalLabel{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $category->id }}">Elimina la categoria</h1>
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
            </div>
        </div>
    </div>
</div>
@endsection
