<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Course extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $guarded = [];
    public $translatable = ['title', "description"];


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "course_user");
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function studies(): HasMany
    {
        return $this->hasMany(Study::class,"course_id");
    }
}
