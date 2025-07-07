@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <div class="card travel-card">
        @if($travel->cover_image)
        <img 
            src="{{ $travel->cover_image }}"
            class="card-img-top" 
            alt="Copertina di {{ $travel->title }}"
            style="max-height: 400px; object-fit: cover;">
        @endif

        <div class="card-body">
            <h1 class="card-title mb-3">{{ $travel->title }}</h1>

            <div class="mb-3">
                @if($travel->category)
                    <i class="{{ $travel->category->icon }} me-2"></i> 
                    {{ $travel->category->name }}
                @else
                    <span>Categoria non definita</span>
                @endif
            </div>

            <div class="mb-3 d-flex flex-wrap gap-2">
                @foreach ($travel->tags as $tag)
                    <span class="badge rounded-pill me-1" style="background-color: {{ $tag->color }}">{{ $tag->name }}</span>
                @endforeach
            </div>

            <p class="card-text mb-3">{{ $travel->description }}</p>

            <ul class="mb-4">
                <li class="list-group-item">
                    <strong>Destinazione:</strong> {{ $travel->destination_city }}, {{ $travel->destination_country }}
                </li>
                <li class="list-group-item">
                    <strong>Periodo:</strong> 
                    {{ \Carbon\Carbon::parse($travel->departure_date)->format('d M Y') }} - 
                    {{ \Carbon\Carbon::parse($travel->return_date)->format('d M Y') }}
                </li>
                <li class="list-group-item">
                    <strong>Pubblicato:</strong> 
                    @if($travel->is_published)
                        <span class="badge bg-success">
                            <i class="fas fa-check"></i>
                        </span>
                    @else
                        <span class="badge bg-danger">
                            <i class="fas fa-times"></i>
                        </span>
                    @endif
                </li>
            </ul>

            <a href="{{ route('admin.travels.index') }}" class="btn btn-outline-primary">
                ← Torna alla lista viaggi
            </a>
        </div>
    </div>

</div>
@endsection
