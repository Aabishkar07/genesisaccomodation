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
        $roomTypes = [
            [
                'name' => 'Standard Single Room',
                'description' => 'Comfortable single room with essential amenities. Perfect for solo travelers looking for a cozy and affordable accommodation option.',
                'price_per_night' => 89.99,
                'capacity' => 1,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'size' => '250 sq ft',
                'status' => 'available',
                'sort_order' => 1,
                'amenities' => ['WiFi', 'Air Conditioning', 'TV', 'Mini Fridge', 'Coffee Maker', 'Iron', 'Hair Dryer'],
            ],
            [
                'name' => 'Deluxe Double Room',
                'description' => 'Spacious double room with premium amenities and stunning views. Ideal for couples or business travelers seeking comfort and luxury.',
                'price_per_night' => 149.99,
                'capacity' => 2,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'size' => '350 sq ft',
                'status' => 'available',
                'sort_order' => 2,
                'amenities' => ['WiFi', 'Air Conditioning', 'Heating', 'TV', 'Mini Fridge', 'Coffee Maker', 'Iron', 'Hair Dryer', 'Safe', 'Balcony'],
            ],
            [
                'name' => 'Family Suite',
                'description' => 'Large family suite with multiple bedrooms and living area. Perfect for families or groups traveling together.',
                'price_per_night' => 249.99,
                'capacity' => 4,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'size' => '600 sq ft',
                'status' => 'available',
                'sort_order' => 3,
                'amenities' => ['WiFi', 'Air Conditioning', 'Heating', 'Kitchen', 'Washing Machine', 'TV', 'Mini Fridge', 'Coffee Maker', 'Iron', 'Hair Dryer', 'Safe', 'Balcony'],
            ],
            [
                'name' => 'Executive Suite',
                'description' => 'Luxury executive suite with premium furnishings and exclusive amenities. Designed for discerning travelers who expect the finest accommodations.',
                'price_per_night' => 399.99,
                'capacity' => 2,
                'bedrooms' => 1,
                'bathrooms' => 2,
                'size' => '800 sq ft',
                'status' => 'available',
                'sort_order' => 4,
                'amenities' => ['WiFi', 'Air Conditioning', 'Heating', 'Kitchen', 'Washing Machine', 'Dryer', 'TV', 'Mini Fridge', 'Coffee Maker', 'Iron', 'Hair Dryer', 'Safe', 'Balcony', 'Concierge', 'Room Service'],
            ],
            [
                'name' => 'Presidential Suite',
                'description' => 'Ultimate luxury experience with the most exclusive amenities and services. Our finest accommodation offering unparalleled comfort and sophistication.',
                'price_per_night' => 699.99,
                'capacity' => 4,
                'bedrooms' => 2,
                'bathrooms' => 3,
                'size' => '1200 sq ft',
                'status' => 'available',
                'sort_order' => 5,
                'amenities' => ['WiFi', 'Air Conditioning', 'Heating', 'Kitchen', 'Washing Machine', 'Dryer', 'Pool', 'Gym', 'Spa', 'Restaurant', 'Bar', 'Room Service', 'Concierge', 'Security', 'Elevator', 'Balcony', 'Garden', 'Terrace', 'TV', 'Mini Fridge', 'Coffee Maker', 'Iron', 'Hair Dryer', 'Safe'],
            ],
        ];

        foreach ($roomTypes as $roomType) {
            RoomType::create($roomType);
        }
    }
} 