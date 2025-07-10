<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        // prendo tutti i viaggi con le categorie e i tag e li ordino in base alla data di partenza restituendo 6 viaggi
        $travels = Travel::with(['category', 'tags'])->orderBy('departure_date', 'desc')->paginate(6);

        return response()->json(
            [
                'success' => true,
                'data' => $travels
            ]
        );
    }

    public function show(Travel $travel)
    {
        // prendo tutti i viaggi con le relative informazioni
        $travel->load(['category', 'tags', 'itinerarySteps', 'packingItems', 'places', 'photos']);

        return response()->json(
            [
                'success' => true,
                'data' => $travel
            ]
        );
    }
}
