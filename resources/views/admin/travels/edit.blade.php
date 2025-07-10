@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card travel-card">
            <div class="card-body">
                <h1 class="card-title mb-4">Modifica viaggio: {{ $travel->title }}</h1>
        
                <form action="{{ route('admin.travels.update', $travel->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
        
                    @method('PUT')
        
                    <div class="mb-4">
                        <label for="title" class="form-label">Titolo</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="title"
                            value="{{ $travel->title }}"
                        />
                    </div>
        
                    <div class="mb-4">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" class="form-control">{{ $travel->description }}</textarea>
                    </div>
        
                    <div class="row mb-4">
                        <div class="col">
                            <label for="destination_country" class="form-label">Paese di destinazione</label>
                            <input
                            type="text"
                            class="form-control"
                            name="destination_country"
                            id="destination_country"
                            value="{{ $travel->destination_country }}"
                            />
                        </div>
        
                        <div class="col">
                            <label for="destination_city" class="form-label">Città di destinazione</label>
                            <input
                            type="text"
                            class="form-control"
                            name="destination_city"
                            id="destination_city"
                            value="{{ $travel->destination_city }}"
                            />
                        </div>
                    </div>
        
                    <div class="row mb-4">
                        <div class="col">
                            <label for="departure_date" class="form-label">Data di partenza</label>
                            <input
                            type="date"
                            class="form-control"
                            name="departure_date"
                            id="departure_date"
                            value="{{ $travel->departure_date }}"
                            />
                        </div>
        
                        <div class="col">
                            <label for="return_date" class="form-label">Data di ritorno</label>
                            <input
                            type="date"
                            class="form-control"
                            name="return_date"
                            id="return_date"
                            value="{{ $travel->return_date }}"
                            />
                        </div>
                    </div>
        
                    <div class="mb-4">
                        <label for="category_id" class="form-label">Categoria</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $travel->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="mb-4">
                        <label class="form-label d-block">Tag</label>
                        <div class="border rounded p-2">
        
                            @foreach ($tags as $tag)
                                
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="tags[]"
                                    value="{{ $tag->id }}"
                                    id="tag - {{ $tag->id }}"
                                    {{ $travel->tags->contains($tag->id) ? 'checked' : '' }}
                                />
                                <label class="form-check-label" for="tag - {{ $tag->id }}"> {{ $tag->name }} </label>
                            </div>
                
                            @endforeach
            
                        </div>
                    </div>
        
                    <div class="mb-4">
                        <label for="cover_image" class="form-label">Immagine di copertina</label>
                        <div class="d-flex align-items-center gap-3">
                            <input
                                type="file"
                                class="form-control"
                                name="cover_image"
                                id="cover_image"
                            />
                    
                            @if ($travel->cover_image)
                                <img
                                    src="{{ asset('storage/' . $travel->cover_image) }}"
                                    alt="{{ $travel->title }}"
                                    class="img-fluid rounded"
                                    style="width: 100px;"
                                />
                            @endif
                        </div>
                    </div>
                    
        
                    <div class="mb-4 form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="is_published"
                            id="is_published"
                            {{ $travel->is_published ? 'checked' : '' }}
                            />
                        <label for="is_published" class="form-check-label">Pubblicato</label>
                    </div>
        
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-outline-warning">Modifica Viaggio</button>
                        <a href="{{ route('admin.travels.index') }}" class="btn btn-outline-secondary">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection