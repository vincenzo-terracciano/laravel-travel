@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card travel-card">
            <div class="card-body">
                <h1 class="card-title mb-4">Nuovo viaggio</h1>
        
                <form action="{{ route('admin.travels.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
        
                    <div class="mb-4">
                        <label for="title" class="form-label">Titolo</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="title"
                            required
                        />
                    </div>
        
                    <div class="mb-4">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
        
                    <div class="row mb-4">
                        <div class="col">
                            <label for="destination_country" class="form-label">Paese di destinazione</label>
                            <input
                            type="text"
                            class="form-control"
                            name="destination_country"
                            id="destination_country"
                            required
                            />
                        </div>
        
                        <div class="col">
                            <label for="destination_city" class="form-label">Città di destinazione</label>
                            <input
                            type="text"
                            class="form-control"
                            name="destination_city"
                            id="destination_city"
                            required
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
                            required
                            />
                        </div>
        
                        <div class="col">
                            <label for="return_date" class="form-label">Data di ritorno</label>
                            <input
                            type="date"
                            class="form-control"
                            name="return_date"
                            id="return_date"
                            required
                            />
                        </div>
                    </div>
        
                    <div class="mb-4">
                        <label for="category_id" class="form-label">Categoria</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                
                                />
                                <label class="form-check-label" for="tag - {{ $tag->id }}"> {{ $tag->name }} </label>
                            </div>
                
                            @endforeach
            
                        </div>
                    </div>
        
                    <div class="mb-4">
                        <label for="cover_image" class="form-label">Immagine di copertina</label>
                        <input
                            type="file"
                            class="form-control"
                            name="cover_image"
                            id="cover_image"
                        />
                    </div>
        
                    <div class="mb-4 form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="is_published"
                            id="is_published"
                            />
                        <label for="is_published" class="form-check-label">Pubblicato</label>
                    </div>
        
                    <div class="mt-5 d-flex gap-2">
                        <button type="submit" class="btn btn-outline-primary">Crea Viaggio</button>
                        <a href="{{ route('admin.travels.index') }}" class="btn btn-outline-secondary">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection