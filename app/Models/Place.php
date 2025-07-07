<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
