<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItineraryStep;
use App\Models\Place;
use App\Models\Travel;
use Illuminate\Http\Request;

class ItineraryStepsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Travel $travel)
    {
        $steps = $travel->itinerarySteps()->orderBy('day_number')->get();

        return view('admin.itinerary_steps.index', compact('steps', 'travel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Travel $travel)
    {
        // Prendo i place legati al viaggio per il select
        $places = Place::where('travel_id', $travel->id)->get();

        $activityTypes = config('activity_types');

        return view('admin.itinerary_steps.create', compact('travel', 'places', 'activityTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Travel $travel)
    {
        $data = $request->all();

        $newItineraryStep = new ItineraryStep();

        $newItineraryStep->travel_id = $travel->id;
        $newItineraryStep->place_id = $data["place_id"];
        $newItineraryStep->title = $data["title"];
        $newItineraryStep->description = $data["description"];
        $newItineraryStep->estimated_time = $data["estimated_time"];
        $newItineraryStep->activity_type = $data["activity_type"];
        $newItineraryStep->day_number = $data["day_number"];

        $newItineraryStep->save();

        return redirect()->route('admin.travels.itinerary_steps.index', $travel->id)
            ->with('success', 'Nuovo step itinerario aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel, ItineraryStep $itinerary_step)
    {
        return view('admin.itinerary_steps.show', compact('travel', 'itinerary_step'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel, ItineraryStep $itinerary_step)
    {
        $activityTypes = config('activity_types');

        return view('admin.itinerary_steps.edit', compact('travel', 'itinerary_step', 'activityTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel, ItineraryStep $itinerary_step)
    {
        $data = $request->all();

        $itinerary_step->travel_id = $travel->id;
        $itinerary_step->place_id = $data['place_id'];
        $itinerary_step->title = $data['title'];
        $itinerary_step->description = $data['description'];
        $itinerary_step->estimated_time = $data['estimated_time'];
        $itinerary_step->activity_type = $data['activity_type'];
        $itinerary_step->day_number = $data['day_number'];

        $itinerary_step->update();

        return redirect()->route('admin.travels.itinerary_steps.show', [$travel->id, $itinerary_step->id])
            ->with('success', 'Step itinerario modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel, ItineraryStep $itinerary_step)
    {
        $itinerary_step->delete();

        return redirect()->route('admin.travels.itinerary_steps.index', $travel->id)
            ->with('deleted', 'Step itinerario eliminato con successo!');
    }
}
