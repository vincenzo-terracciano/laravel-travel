@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card travel-card">
            <div class="card-body">
                <h2 class="card-title mb-4">Modifica Step Itinerario Giorno {{ $itinerary_step->day_number }}: {{ $itinerary_step->title }}</h2>

                <form action="{{ route('admin.travels.itinerary_steps.update', [$travel->id, $itinerary_step->id]) }}" method="POST">
                    @csrf

                    @method('PUT')
            
                    <div class="mb-4">
                        <label for="day_number" class="form-label">Giorno</label>
                        <input 
                            type="number" 
                            name="day_number" 
                            id="day_number" 
                            class="form-control" 
                            value="{{ $itinerary_step->day_number }}" required>
                    </div>
            
                    <div class="mb-4">
                        <label for="title" class="form-label">Titolo</label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            class="form-control" 
                            value="{{ $itinerary_step->title }}" required>
                    </div>
            
                    <div class="mb-4">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            class="form-control" required>
                            {{ $itinerary_step->description }}
                        </textarea>
                    </div>
            
                    <div class="mb-4">
                        <label for="estimated_time" class="form-label">Orario stimato</label>
                        <input 
                            type="time" 
                            name="estimated_time" 
                            id="estimated_time" 
                            class="form-control" 
                            value="{{ $itinerary_step->estimated_time }}">
                    </div>
            
                    <div class="mb-4">
                        <label for="activity_type" class="form-label">Tipo di attività</label>
                        <select name="activity_type" id="activity_type" class="form-select">
                            <option value="">Seleziona tipo attività</option>
                            @foreach ($activityTypes as $type)
                                <option value="{{ $type }}" {{ $itinerary_step->activity_type === $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mb-4">
                        <label for="place_id" class="form-label">Luogo</label>
                        <select name="place_id" id="place_id" class="form-select">
                            <option value="">Seleziona luogo</option>
                            @foreach ($travel->places as $place)
                                <option value="{{ $place->id }}" {{ $itinerary_step->place_id == $place->id ? 'selected' : '' }}>
                                    {{ $place->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('admin.travels.itinerary_steps.index', $travel->id) }}" class="btn btn-outline-secondary">← Annulla</a>
                        <button type="submit" class="btn btn-outline-warning">Modifica Step Itinerario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection