<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class PackingItemController extends Controller
{
    public function index(Travel $travel)
    {
        $packingItems = $travel->packingItems;

        return response()->json(
            [
                'success' => true,
                'data' => $packingItems
            ]
        );
    }
}
