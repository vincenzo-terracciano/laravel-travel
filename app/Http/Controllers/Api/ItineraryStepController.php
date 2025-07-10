<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class ItineraryStepController extends Controller
{
    public function index(Travel $travel)
    {
        $steps = $travel->itinerarySteps;

        return response()->json(
            [
                'success' => true,
                'data' => $steps
            ]
        );
    }
}
