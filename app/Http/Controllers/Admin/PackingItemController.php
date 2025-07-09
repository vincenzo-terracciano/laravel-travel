<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackingItem;
use App\Models\Travel;
use Illuminate\Http\Request;

class PackingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Travel $travel)
    {
        $items = $travel->packingItems;

        return view('admin.packing_items.index', compact('travel', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Travel $travel)
    {
        return view('admin.packing_items.create', compact('travel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Travel $travel)
    {
        $data = $request->all();

        $newItem = new PackingItem();

        $newItem->travel_id = $travel->id;
        $newItem->item_name = $data["item_name"];
        $newItem->is_mandatory = isset($data["is_mandatory"]);

        $newItem->save();

        return redirect()->route('admin.travels.packing_items.index', $travel->id)
            ->with('success', 'Oggetto aggiunto alla valigia con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel, PackingItem $packing_item)
    {
        return view('admin.packing_items.edit', compact('travel', 'packing_item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
