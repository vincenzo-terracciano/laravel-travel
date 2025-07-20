{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
    <section class="vh-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-4">Benvenuto in VoyaGo!</h1>
            <p class="lead text-muted mb-4">
                Esplora gli itinerari, le tue mete preferite e una valigia pronta per ogni avventura.
            </p>
            <a href="{{ route('admin.travels.index') }}" class="btn btn-primary btn-lg px-5">
                Login
            </a>
        </div>
    </section>
@endsection
