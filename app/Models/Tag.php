<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function travels()
    {
        return $this->belongsToMany(Travel::class);
    }
}
