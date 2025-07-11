@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card travel-card">
            <div class="card-body">
                <h2 class="card-title mb-4">Modifica l'oggetto {{ $packing_item->item_name }} nella valigia per il viaggio a {{ $travel->destination_city }}, {{ $travel->destination_country }}</h2>

                <form action="{{ route('admin.travels.packing_items.update', [$travel->id, $packing_item->id]) }}" method="POST">
                    @csrf

                    @method('PUT')
            
                    <div class="mb-4">
                        <label for="item_name" class="form-label">Nome oggetto</label>
                        <input 
                            type="text" 
                            name="item_name" 
                            id="item_name" 
                            class="form-control" 
                            value="{{ $packing_item->item_name }}" required>
                    </div>
            
                    <div class="form-check mb-4">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="is_mandatory" 
                            name="is_mandatory" {{ $packing_item->is_mandatory ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_mandatory">
                            Obbligatorio
                        </label>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-outline-warning">Modifica Oggetto</button>
                        <a href="{{ route('admin.travels.packing_items.index', $travel->id) }}" class="btn btn-outline-secondary">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection