<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(Travel $travel)
    {
        // recupero i luoghi da visitare per un viaggio specifico accedendo alla relazione di un singolo Model già caricato
        $places = $travel->places;

        return response()->json(
            [
                'success' => true,
                'data' => $places
            ]
        );
    }
}
