<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            ['key' => 'site_name', 'value' => 'Genesis Accommodation', 'type' => 'text', 'group' => 'general', 'description' => 'Website name'],
            ['key' => 'site_description', 'value' => 'Your trusted partner for comfortable accommodations', 'type' => 'textarea', 'group' => 'general', 'description' => 'Website description'],
            ['key' => 'site_logo', 'value' => '', 'type' => 'image', 'group' => 'general', 'description' => 'Website logo'],
            ['key' => 'site_favicon', 'value' => '', 'type' => 'image', 'group' => 'general', 'description' => 'Website favicon'],

            // Contact Information
            ['key' => 'contact_email', 'value' => 'info@genesisaccommodation.com', 'type' => 'email', 'group' => 'contact', 'description' => 'Primary contact email'],
            ['key' => 'contact_phone', 'value' => '+1 (555) 123-4567', 'type' => 'text', 'group' => 'contact', 'description' => 'Primary contact phone'],
            ['key' => 'contact_address', 'value' => '123 Main Street, City, State 12345', 'type' => 'textarea', 'group' => 'contact', 'description' => 'Business address'],

            // Social Media
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/genesisaccommodation', 'type' => 'url', 'group' => 'social', 'description' => 'Facebook page URL'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/genesisaccommodation', 'type' => 'url', 'group' => 'social', 'description' => 'Twitter profile URL'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/genesisaccommodation', 'type' => 'url', 'group' => 'social', 'description' => 'Instagram profile URL'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/genesisaccommodation', 'type' => 'url', 'group' => 'social', 'description' => 'LinkedIn company page URL'],

            // Footer Settings
            ['key' => 'footer_text', 'value' => '© 2024 Genesis Accommodation. All rights reserved.', 'type' => 'text', 'group' => 'footer', 'description' => 'Footer copyright text'],
            ['key' => 'footer_description', 'value' => 'Your trusted partner for comfortable and affordable accommodations.', 'type' => 'textarea', 'group' => 'footer', 'description' => 'Footer description'],

            // SEO Settings
            ['key' => 'default_meta_title', 'value' => 'Genesis Accommodation - Your Trusted Partner for Comfortable Stays', 'type' => 'text', 'group' => 'seo', 'description' => 'Default meta title'],
            ['key' => 'default_meta_description', 'value' => 'Discover comfortable and affordable accommodations with Genesis Accommodation. Book your perfect stay today.', 'type' => 'textarea', 'group' => 'seo', 'description' => 'Default meta description'],
            ['key' => 'default_meta_keywords', 'value' => 'accommodation, hotel, lodging, comfortable stay, affordable accommodation', 'type' => 'text', 'group' => 'seo', 'description' => 'Default meta keywords'],

            // Business Hours
            ['key' => 'business_hours', 'value' => 'Monday - Friday: 9:00 AM - 6:00 PM\nSaturday: 10:00 AM - 4:00 PM\nSunday: Closed', 'type' => 'textarea', 'group' => 'contact', 'description' => 'Business operating hours'],

            // Payment Information
            ['key' => 'payment_methods', 'value' => 'Credit Card, Debit Card, PayPal, Bank Transfer', 'type' => 'text', 'group' => 'payment', 'description' => 'Accepted payment methods'],

            // Legal Pages
            ['key' => 'privacy_policy_url', 'value' => '/privacy-policy', 'type' => 'url', 'group' => 'legal', 'description' => 'Privacy policy page URL'],
            ['key' => 'terms_of_service_url', 'value' => '/terms-of-service', 'type' => 'url', 'group' => 'legal', 'description' => 'Terms of service page URL'],
            ['key' => 'cancellation_policy_url', 'value' => '/cancellation-policy', 'type' => 'url', 'group' => 'legal', 'description' => 'Cancellation policy page URL'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
