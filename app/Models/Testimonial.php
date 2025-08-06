<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'company',
        'testimonial',
        'rating',
        'image',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
    ];

    protected $casts = [
        'status' => 'string',
        'rating' => 'integer',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($testimonial) {
            if (empty($testimonial->slug)) {
                $testimonial->slug = Str::slug($testimonial->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
