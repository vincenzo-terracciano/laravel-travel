<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItineraryStep extends Model
{
    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
