<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(Travel $travel)
    {
        $places = $travel->places;

        return response()->json(
            [
                'success' => true,
                'data' => $places
            ]
        );
    }
}
