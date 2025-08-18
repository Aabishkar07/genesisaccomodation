<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoomType;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing room types
        RoomType::query()->delete();

        $roomTypes = [
            [
                'name' => 'Standard Single Room',
                'description' => 'Comfortable single room with essential amenities. Perfect for solo travelers looking for a cozy and affordable accommodation option.',
                'status' => 'available',
                'sort_order' => 1,
                'meta_title' => 'Standard Single Room - Comfortable Solo Accommodation',
                'meta_description' => 'Book a comfortable single room with essential amenities. Perfect for solo travelers seeking affordable accommodation.',
                'meta_keywords' => 'single room, solo travel, affordable accommodation, comfortable stay',
            ],
            [
                'name' => 'Deluxe Double Room',
                'description' => 'Spacious double room with premium amenities and stunning views. Ideal for couples or business travelers seeking comfort and luxury.',
                'status' => 'available',
                'sort_order' => 2,
                'meta_title' => 'Deluxe Double Room - Premium Couple Accommodation',
                'meta_description' => 'Experience luxury in our spacious double room with premium amenities and stunning views.',
                'meta_keywords' => 'double room, luxury accommodation, couple travel, premium amenities',
            ],
            [
                'name' => 'Family Suite',
                'description' => 'Large family suite with multiple bedrooms and living area. Perfect for families or groups traveling together.',
                'status' => 'available',
                'sort_order' => 3,
                'meta_title' => 'Family Suite - Spacious Family Accommodation',
                'meta_description' => 'Perfect family accommodation with multiple bedrooms and living area for groups traveling together.',
                'meta_keywords' => 'family suite, group accommodation, multiple bedrooms, family travel',
            ],
            [
                'name' => 'Executive Suite',
                'description' => 'Luxury executive suite with premium furnishings and exclusive amenities. Designed for discerning travelers who expect the finest accommodations.',
                'status' => 'available',
                'sort_order' => 4,
                'meta_title' => 'Executive Suite - Luxury Business Accommodation',
                'meta_description' => 'Premium executive suite with luxury furnishings and exclusive amenities for discerning travelers.',
                'meta_keywords' => 'executive suite, luxury accommodation, business travel, premium amenities',
            ],
            [
                'name' => 'Presidential Suite',
                'description' => 'Ultimate luxury experience with the most exclusive amenities and services. Our finest accommodation offering unparalleled comfort and sophistication.',
                'status' => 'available',
                'sort_order' => 5,
                'meta_title' => 'Presidential Suite - Ultimate Luxury Accommodation',
                'meta_description' => 'Experience ultimate luxury in our presidential suite with exclusive amenities and unparalleled service.',
                'meta_keywords' => 'presidential suite, ultimate luxury, exclusive amenities, premium service',
            ],
        ];

        foreach ($roomTypes as $roomType) {
            RoomType::create($roomType);
        }

        $this->command->info('Room types seeded successfully!');
    }
}
