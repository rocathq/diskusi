<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Thread relationship (many-to-many)
     */
    public function thread()
    {
        return $this->belongsToMany(App\Models\Thread::class);
    }
}
