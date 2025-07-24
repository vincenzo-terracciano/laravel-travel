<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class ItineraryStepController extends Controller
{
    public function index(Travel $travel)
    {
        // recupero gli step dell'itinerario per un viaggio specifico accedendo alla relazione di un singolo Model già caricato
        $steps = $travel->itinerarySteps;

        return response()->json(
            [
                'success' => true,
                'data' => $steps
            ]
        );
    }
}
