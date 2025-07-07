@extends('layouts.admin')

@section('content')

<div class="welcome d-flex flex-column justify-content-center align-items-center vh-100">
    <h1>Benvenuto {{ $user->name }}!</h1>
    <p>Questa è la tua area riservata, da qui potrai gestire i tuoi viaggi.</p>
</div>
    
@endsection