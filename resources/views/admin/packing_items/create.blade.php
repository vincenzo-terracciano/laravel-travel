@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card travel-card">
            <div class="card-body">
                <h2 class="card-title mb-4">Aggiungi un elemento alla valigia per il viaggio a {{ $travel->destination_city }}, {{ $travel->destination_country }}</h2>

                <form action="{{ route('admin.travels.packing_items.store', $travel->id) }}" method="POST">
                    @csrf
            
                    <div class="mb-4">
                        <label for="item_name" class="form-label">Nome oggetto</label>
                        <input 
                            type="text" 
                            name="item_name" 
                            id="item_name" 
                            class="form-control" required>
                    </div>
            
                    <div class="form-check mb-4">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="is_mandatory" 
                            name="is_mandatory">
                        <label class="form-check-label" for="is_mandatory">
                            Obbligatorio
                        </label>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('admin.travels.packing_items.index', $travel->id) }}" class="btn btn-outline-secondary">← Annulla</a>
                        <button type="submit" class="btn btn-outline-primary">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection