@extends('layouts.admin')

@section('content')

<div class="welcome d-flex flex-column justify-content-center align-items-center vh-100 text-center px-3">
    <h1 class="display-3 fw-bold mb-3">Benvenuto {{ $user->name }}!</h1>
    <p class="lead text-muted mb-4">Questa è la tua area riservata, da qui potrai gestire i tuoi viaggi.</p>
    <a href="{{ route('admin.travels.index') }}" class="btn btn-primary btn-lg px-5">
        Vai alla Dashboard
    </a>
</div>
    
@endsection
