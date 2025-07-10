<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index(Travel $travel)
    {
        $photos = $travel->photos;

        return response()->json(
            [
                'success' => true,
                'data' => $photos
            ]
        );
    }
}
