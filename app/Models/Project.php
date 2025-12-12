<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'link',
    ];

    // auto-generate slug when setting title (optional convenience)
    public static function booted()
    {
        static::saving(function ($project) {
            if (empty($project->slug) && !empty($project->title)) {
                $project->slug = Str::slug($project->title) . '-' . uniqid();
            }
        });
    }
}
