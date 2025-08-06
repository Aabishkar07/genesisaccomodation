<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accommodation;
use App\Models\RoomType;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing accommodations
        Accommodation::truncate();
        
        $roomTypes = RoomType::all();
        
        if ($roomTypes->isEmpty()) {
            $this->command->info('No room types found. Please run RoomTypeSeeder first.');
            return;
        }

        $accommodations = [
            [
                'name' => 'Sunset Beach Resort & Spa',
                'description' => 'Luxurious beachfront resort with stunning ocean views and world-class amenities.',
                'address' => '123 Beach Road',
                'city' => 'Miami',
                'state' => 'Florida',
                'country' => 'USA',
                'postal_code' => '33139',
                'phone' => '+1-305-555-0123',
                'email' => 'info@sunsetbeachresort.com',
                'website' => 'https://sunsetbeachresort.com',
                'latitude' => 25.7617,
                'longitude' => -80.1918,
                'room_type_id' => $roomTypes->random()->id,
                'status' => 'active',
                'sort_order' => 1,
            ],
            [
                'name' => 'Mountain View Lodge & Cabins',
                'description' => 'Cozy mountain lodge surrounded by pristine wilderness and hiking trails.',
                'address' => '456 Mountain Trail',
                'city' => 'Aspen',
                'state' => 'Colorado',
                'country' => 'USA',
                'postal_code' => '81611',
                'phone' => '+1-970-555-0456',
                'email' => 'info@mountainviewlodge.com',
                'website' => 'https://mountainviewlodge.com',
                'latitude' => 39.1911,
                'longitude' => -106.8175,
                'room_type_id' => $roomTypes->random()->id,
                'status' => 'active',
                'sort_order' => 2,
            ],
            [
                'name' => 'Urban Boutique Hotel & Suites',
                'description' => 'Modern boutique hotel in the heart of the city with contemporary design.',
                'address' => '789 Downtown Ave',
                'city' => 'New York',
                'state' => 'New York',
                'country' => 'USA',
                'postal_code' => '10001',
                'phone' => '+1-212-555-0789',
                'email' => 'info@urbanboutiquehotel.com',
                'website' => 'https://urbanboutiquehotel.com',
                'latitude' => 40.7505,
                'longitude' => -73.9934,
                'room_type_id' => $roomTypes->random()->id,
                'status' => 'active',
                'sort_order' => 3,
            ],
        ];

        foreach ($accommodations as $accommodationData) {
            Accommodation::create($accommodationData);
        }

        $this->command->info('Accommodations seeded successfully!');
    }
}
