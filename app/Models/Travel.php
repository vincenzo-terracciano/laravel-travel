<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travels';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function itinerarySteps()
    {
        return $this->hasMany(ItineraryStep::class);
    }

    public function packingItems()
    {
        return $this->hasMany(PackingItem::class);
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
