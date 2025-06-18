<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Post extends Model implements HasMedia
{
    use HasTranslations, HasSlug, InteractsWithMedia;
    protected $table = "posts";

    protected $fillable = ["title", "slug", "description", "user_id"];

    public $translatable = ['title', 'description'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom([$this, 'getEnglishTitle'])
            ->usingLanguage("en")
            ->saveSlugsTo('slug');
    }

    /**
     * Get the English title for slug generation
     */
    public function getEnglishTitle(): string
    {
        return $this->getTranslation('title', 'en') ?? '';
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, "post_id");
    }

}
