<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'phone',
        'email',
        'website',
        'latitude',
        'longitude',
        'room_type_id',
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
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'gallery' => 'array',
        'amenities' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($accommodation) {
            if (empty($accommodation->slug)) {
                $accommodation->slug = Str::slug($accommodation->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
