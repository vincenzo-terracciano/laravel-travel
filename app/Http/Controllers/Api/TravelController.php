<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        // carico le relazioni tra i modelli utilizzando l'eager loading e passo i metodi di relazione definiti nel modello 
        // prendo tutti i viaggi con le categorie e i tag e li ordino in base alla data di partenza restituendo 10 viaggi
        $travels = Travel::with(['category', 'tags'])->orderBy('departure_date', 'asc')->paginate(10);

        return response()->json(
            [
                'success' => true,
                'data' => $travels
            ]
        );
    }

    public function show(Travel $travel)
    {
        // carico le relazioni dopo chè è stato definito il modello
        // restituisco tutti i viaggi con le relative informazioni
        $travel->load(['category', 'tags', 'itinerarySteps', 'packingItems', 'places', 'photos']);

        return response()->json(
            [
                'success' => true,
                'data' => $travel
            ]
        );
    }
}
