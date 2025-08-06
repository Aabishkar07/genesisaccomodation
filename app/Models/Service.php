<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'image',
        'features',
        'price',
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
        'price' => 'decimal:2',
        'sort_order' => 'integer',
        'features' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
