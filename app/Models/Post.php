<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory, HasUlids, HasSlug;

    protected $fillable = ['title', 'slug', 'content', 'user_id'];

    // Relation with User model
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Relation with Tag model
    public function tags() : BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    // Relation with Image model
    public function image() : MorphOne {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Relation with Comment model
    public function comments() : MorphMany {
        return $this->morphMany(Comment::class, 'commentable');
    }


    // composer require spatie/laravel-sluggable
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['title'])
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
