<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::orderBy('departure_date', 'desc')->paginate(10);

        return view('admin.travels.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // prendo tutte le categorie
        $categories = Category::all();

        // prendo tutti i tag
        $tags = Tag::all();

        return view('admin.travels.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newTravel = new Travel();

        $newTravel->title = $data["title"];
        $newTravel->description = $data["description"];
        $newTravel->destination_country = $data["destination_country"];
        $newTravel->destination_city = $data["destination_city"];
        $newTravel->departure_date = $data["departure_date"];
        $newTravel->return_date = $data["return_date"];
        $newTravel->category_id = $data["category_id"];
        $newTravel->cover_image = $data["cover_image"];
        $newTravel->is_published = isset($data["is_published"]);

        $newTravel->save();

        // verifico se ricevo i tag
        if ($request->has('tags')) {

            // aggiungo alla tabella pivot tutti i tag selezionati collegati al viaggio in questione
            $newTravel->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.travels.index')
            ->with('success', 'Viaggio creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        return view('admin.travels.show', compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        // prendo tutte le categorie
        $categories = Category::all();

        // prendo tutti i tags
        $tags = Tag::all();

        return view('admin.travels.edit', compact('travel', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $data = $request->all();

        $travel->title = $data["title"];
        $travel->description = $data["description"];
        $travel->destination_country = $data["destination_country"];
        $travel->destination_city = $data["destination_city"];
        $travel->departure_date = $data["departure_date"];
        $travel->return_date = $data["return_date"];
        $travel->category_id = $data["category_id"];
        $travel->cover_image = $data["cover_image"];
        $travel->is_published = isset($data["is_published"]);

        $travel->update();

        // verifico se sto ricevendo i tags
        if ($request->has('tags')) {

            // sincronizzo i tag della tabella pivot
            $travel->tags()->sync($data["tags"]);
        } else {

            // se non ricevo i tags allora elimino dalla tabella pivot tutti i tag collegati al viaggio in questione
            $travel->tags()->detach();
        }

        return redirect()->route('admin.travels.show', $travel->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
