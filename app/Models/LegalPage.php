<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'subtitle',
        'content',
        'is_active',
        'last_updated'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'last_updated' => 'datetime'
    ];

    // Page types
    const TYPE_PRIVACY_POLICY = 'privacy_policy';
    const TYPE_TERMS_CONDITIONS = 'terms_conditions';

    /**
     * Get privacy policy page
     */
    public static function getPrivacyPolicy()
    {
        return self::where('type', self::TYPE_PRIVACY_POLICY)
                   ->where('is_active', true)
                   ->first();
    }

    /**
     * Get terms and conditions page
     */
    public static function getTermsConditions()
    {
        return self::where('type', self::TYPE_TERMS_CONDITIONS)
                   ->where('is_active', true)
                   ->first();
    }

    /**
     * Get page type display name
     */
    public function getTypeDisplayNameAttribute()
    {
        return match($this->type) {
            self::TYPE_PRIVACY_POLICY => 'Privacy Policy',
            self::TYPE_TERMS_CONDITIONS => 'Terms & Conditions',
            default => 'Unknown'
        };
    }

    /**
     * Get page type color scheme
     */
    public function getTypeColorSchemeAttribute()
    {
        return match($this->type) {
            self::TYPE_PRIVACY_POLICY => [
                'header' => 'from-green-50 to-emerald-50',
                'accent' => 'bg-green-100 text-green-800',
                'button' => 'bg-green-600 hover:bg-green-700',
                'link' => 'text-green-600 hover:text-green-800'
            ],
            self::TYPE_TERMS_CONDITIONS => [
                'header' => 'from-blue-50 to-indigo-50',
                'accent' => 'bg-blue-100 text-blue-800',
                'button' => 'bg-blue-600 hover:bg-blue-700',
                'link' => 'text-blue-600 hover:text-blue-800'
            ],
            default => [
                'header' => 'from-gray-50 to-gray-100',
                'accent' => 'bg-gray-100 text-gray-800',
                'button' => 'bg-gray-600 hover:bg-gray-700',
                'link' => 'text-gray-600 hover:text-gray-800'
            ]
        };
    }

    /**
     * Get content sections for navigation
     */
    public function getContentSectionsAttribute()
    {
        preg_match_all('/<h2[^>]*>(.*?)<\/h2>/', $this->content, $matches);
        return $matches[1] ?? [];
    }

    /**
     * Check if content has multiple sections
     */
    public function hasMultipleSections()
    {
        return count($this->content_sections) > 1;
    }

    /**
     * Get formatted last updated date
     */
    public function getFormattedLastUpdatedAttribute()
    {
        return $this->last_updated ? $this->last_updated->format('F j, Y') : 'Never';
    }

    /**
     * Get page meta description
     */
    public function getMetaDescriptionAttribute()
    {
        // Strip HTML tags and get first 160 characters for meta description
        $cleanContent = strip_tags($this->content);
        return strlen($cleanContent) > 160 ? substr($cleanContent, 0, 157) . '...' : $cleanContent;
    }
}
