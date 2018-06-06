<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyReaction extends Model
{
    public function reply()
    {
        return $this->belongsTo(App\Models\Reply::class);
    }

    public function reaction()
    {
        $this->belongsTo(App\Models\Reaction::class);
    }
}
