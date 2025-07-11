<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Travel $travel)
    {
        $places = $travel->places()->paginate(6);

        return view('admin.places.index', compact('travel', 'places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Travel $travel)
    {
        $placeTypes = config('place_types');

        return view('admin.places.create', compact('travel', 'placeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Travel $travel)
    {
        $data = $request->all();

        $newPlace = new Place();

        $newPlace->travel_id = $travel->id;
        $newPlace->name = $data["name"];
        $newPlace->type = $data["type"];
        $newPlace->description = $data["description"];
        $newPlace->latitude = $data["latitude"];
        $newPlace->longitude = $data["longitude"];

        // controllo per l'upload dell'immagine
        if (array_key_exists("image", $data)) {

            // carico l'immagine del mio storage
            $img_url = Storage::disk('public')->putFile('places', $data['image']);

            // memorizzo il file nel database
            $newPlace->image = $img_url;
        }

        $newPlace->save();

        return redirect()->route('admin.travels.places.index', $travel->id)
            ->with('success', 'Nuovo luogo aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel, Place $place)
    {
        return view('admin.places.show', compact('travel', 'place'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel, Place $place)
    {
        $placeTypes = config('place_types');

        return view('admin.places.edit', compact('travel', 'place', 'placeTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel, Place $place)
    {
        $data = $request->all();

        $place->travel_id = $travel->id;
        $place->name = $data["name"];
        $place->type = $data["type"];
        $place->description = $data["description"];
        $place->latitude = $data["latitude"];
        $place->longitude = $data["longitude"];

        // se è presente l'immagine modificata
        if (array_key_exists("image", $data)) {

            // elimino l'immagine precedente
            if ($place->image) {
                Storage::disk('public')->delete($place->image);
            }

            // carico la nuova immagine
            $img_url = Storage::disk('public')->putFile("places", $data["image"]);

            // aggiorno il database
            $place->image = $img_url;
        }

        $place->update();

        return redirect()->route('admin.travels.places.show', [$travel->id, $place->id])
            ->with('success', 'Luogo modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel, Place $place)
    {
        $place->delete();

        return redirect()->route('admin.travels.places.index', $travel->id)
            ->with('deleted', 'Luogo eliminato con successo!');
    }
}
