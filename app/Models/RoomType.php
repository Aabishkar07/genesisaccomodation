<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_per_night',
        'capacity',
        'bedrooms',
        'bathrooms',
        'size',
        'featured_image',
        'gallery',
        'amenities',
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
        'sort_order' => 'integer',
        'price_per_night' => 'decimal:2',
        'capacity' => 'integer',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'gallery' => 'array',
        'amenities' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($roomType) {
            if (empty($roomType->slug)) {
                $roomType->slug = Str::slug($roomType->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }
}
