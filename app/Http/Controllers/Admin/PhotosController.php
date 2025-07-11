<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Travel $travel)
    {
        $photos = $travel->photos()->latest()->paginate(6);

        return view('admin.photos.index', compact('travel', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Travel $travel)
    {
        return view('admin.photos.create', compact('travel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Travel $travel)
    {
        $data = $request->all();

        $newPhoto = new Photo();

        $newPhoto->travel_id = $travel->id;
        $newPhoto->caption = $data["caption"];

        // controllo per l'upload dell'immagine
        if (array_key_exists("image", $data)) {

            // carico l'immagine del mio storage
            $img_url = Storage::disk('public')->putFile('photos', $data["image"]);

            // memorizzo il file nel database
            $newPhoto->image = $img_url;
        }

        $newPhoto->save();

        return redirect()->route('admin.travels.photos.index', $travel->id)
            ->with('success', 'Foto aggiunta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel, Photo $photo)
    {
        return view('admin.photos.show', compact('travel', 'photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel, Photo $photo)
    {
        return view('admin.photos.edit', compact('travel', 'photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel, Photo $photo)
    {
        $data = $request->all();

        $photo->caption = $data["caption"];

        // se è presente l'immagine modificata
        if (array_key_exists('image', $data)) {

            // elimino l'immagine precedente
            if ($photo->image) {
                Storage::disk('public')->delete($photo->image);
            }

            // carico la nuova immagine
            $img_url = Storage::disk('public')->putFile('photos', $data["image"]);

            // aggiorno il database
            $photo->image = $img_url;
        }

        $photo->update();

        return redirect()->route('admin.travels.photos.index', $travel->id)
            ->with('success', 'Foto modificata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel, Photo $photo)
    {
        $photo->delete();

        return redirect()->route('admin.travels.photos.index', $travel->id)
            ->with('deleted', 'Foto eliminata con successo');
    }
}
