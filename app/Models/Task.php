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

class Task extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $guarded = [];
    public $translatable = ['info'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function study(): BelongsTo
    {
        return $this->belongsTo(Study::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class,"task_id");
    }

}
