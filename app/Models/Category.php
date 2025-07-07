<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function travels()
    {
        return $this->hasMany(Travel::class);
    }
}
