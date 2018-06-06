<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Thread extends Model
{
    use HasSlug;
    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Category relationship (many-to-many)
     */
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Thread creator
     */
    public function creator()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * Thread replies
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->with('replies')->where('slug', $slug)->first();
    }
}
