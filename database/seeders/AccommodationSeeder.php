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
        Accommodation::query()->delete();

        $roomTypes = RoomType::all();

        if ($roomTypes->isEmpty()) {
            $this->command->info('No room types found. Please run RoomTypeSeeder first.');
            return;
        }

        $accommodations = [
            [
                'name' => 'Sunset Beach Resort & Spa',
                'description' => 'Luxurious beachfront resort with stunning ocean views and world-class amenities. Features infinity pools, spa services, multiple dining options, and direct beach access. Perfect for romantic getaways and family vacations.',
                'address' => '123 Beach Road',
                'city' => 'Miami',
                'state' => 'Florida',
                'country' => 'USA',
                'postal_code' => '33139',
                'phone' => '+1-305-555-0123',
                'email' => 'info@sunsetbeachresort.com',
                'max_guest' => 4,
                'bathroom' => 2,
                'bedroom' => 2,
                'room_type_id' => $roomTypes->random()->id,
                'status' => 'active',
                'sort_order' => 1,
                'featured_image' => 'accommodation_sunset_beach_resort.jpg',
                'gallery' => [
                    'accommodation_sunset_beach_1.jpg',
                    'accommodation_sunset_beach_2.jpg',
                    'accommodation_sunset_beach_3.jpg'
                ],
                'amenities' => [
                    'Free WiFi', 'Swimming Pool', 'Spa & Wellness Center', 'Beach Access',
                    'Restaurant & Bar', 'Fitness Center', 'Room Service', 'Concierge'
                ],
                'price' => 299.99,
                'meta_title' => 'Sunset Beach Resort & Spa - Luxury Beachfront Accommodation',
                'meta_description' => 'Experience luxury at our beachfront resort with infinity pools, spa services, and stunning ocean views.',
                'meta_keywords' => 'beach resort, luxury accommodation, spa, infinity pool, ocean view',
            ],
            [
                'name' => 'Mountain View Lodge & Cabins',
                'description' => 'Cozy mountain lodge surrounded by pristine wilderness and hiking trails. Rustic yet comfortable accommodations with panoramic mountain views. Ideal for nature lovers and adventure seekers.',
                'address' => '456 Mountain Trail',
                'city' => 'Aspen',
                'state' => 'Colorado',
                'country' => 'USA',
                'postal_code' => '81611',
                'phone' => '+1-970-555-0456',
                'email' => 'info@mountainviewlodge.com',
                'max_guest' => 6,
                'bathroom' => 2,
                'bedroom' => 3,
                'room_type_id' => $roomTypes->random()->id,
                'status' => 'active',
                'sort_order' => 2,
                'featured_image' => 'accommodation_mountain_lodge.jpg',
                'gallery' => [
                    'accommodation_mountain_lodge_1.jpg',
                    'accommodation_mountain_lodge_2.jpg',
                    'accommodation_mountain_lodge_3.jpg'
                ],
                'amenities' => [
                    'Mountain Views', 'Hiking Trails', 'Fireplace', 'Kitchenette',
                    'Free Parking', 'Pet Friendly', 'Outdoor Deck', 'BBQ Facilities'
                ],
                'price' => 189.99,
                'meta_title' => 'Mountain View Lodge & Cabins - Rustic Mountain Accommodation',
                'meta_description' => 'Stay in our cozy mountain lodge surrounded by wilderness and hiking trails with panoramic mountain views.',
                'meta_keywords' => 'mountain lodge, rustic accommodation, hiking trails, wilderness',
            ],
            [
                'name' => 'Urban Boutique Hotel & Suites',
                'description' => 'Modern boutique hotel in the heart of the city with contemporary design and personalized service. Stylish rooms with city skyline views, rooftop bar, and easy access to major attractions.',
                'address' => '789 Downtown Ave',
                'city' => 'New York',
                'state' => 'New York',
                'country' => 'USA',
                'postal_code' => '10001',
                'phone' => '+1-212-555-0789',
                'email' => 'info@urbanboutiquehotel.com',
                'max_guest' => 2,
                'bathroom' => 1,
                'bedroom' => 1,
                'room_type_id' => $roomTypes->random()->id,
                'status' => 'active',
                'sort_order' => 3,
                'featured_image' => 'accommodation_urban_boutique.jpg',
                'gallery' => [
                    'accommodation_urban_boutique_1.jpg',
                    'accommodation_urban_boutique_2.jpg',
                    'accommodation_urban_boutique_3.jpg'
                ],
                'amenities' => [
                    'City Views', 'Rooftop Bar', 'Business Center', 'Concierge Service',
                    'Valet Parking', 'Room Service', 'Fitness Center', 'Free WiFi'
                ],
                'price' => 249.99,
                'meta_title' => 'Urban Boutique Hotel & Suites - Modern City Accommodation',
                'meta_description' => 'Experience modern luxury in our boutique hotel with city skyline views and rooftop amenities.',
                'meta_keywords' => 'boutique hotel, city accommodation, modern design, rooftop bar',
            ],
            [
                'name' => 'Tropical Paradise Resort',
                'description' => 'Exotic island resort with overwater bungalows and pristine beaches. Experience ultimate luxury with private infinity pools, water sports, and authentic local cuisine.',
                'address' => 'Island Paradise Road',
                'city' => 'Bali',
                'state' => 'Bali',
                'country' => 'Indonesia',
                'postal_code' => '80361',
                'phone' => '+62-361-555-0123',
                'email' => 'info@tropicalparadise.com',
                'max_guest' => 4,
                'bathroom' => 2,
                'bedroom' => 2,
                'room_type_id' => $roomTypes->random()->id,
                'status' => 'active',
                'sort_order' => 4,
                'featured_image' => 'accommodation_tropical_paradise.jpg',
                'gallery' => [
                    'accommodation_tropical_paradise_1.jpg',
                    'accommodation_tropical_paradise_2.jpg',
                    'accommodation_tropical_paradise_3.jpg'
                ],
                'amenities' => [
                    'Overwater Bungalows', 'Private Beach', 'Water Sports', 'Spa Center',
                    'Multiple Restaurants', 'Infinity Pools', 'Kids Club', 'Diving Center'
                ],
                'price' => 599.99,
                'meta_title' => 'Tropical Paradise Resort - Exotic Island Accommodation',
                'meta_description' => 'Experience ultimate luxury in our exotic island resort with overwater bungalows and pristine beaches.',
                'meta_keywords' => 'island resort, overwater bungalows, tropical paradise, luxury accommodation',
            ],
            [
                'name' => 'Historic Castle Hotel',
                'description' => 'Medieval castle transformed into a luxury hotel with modern amenities. Experience history with guided tours, traditional dining, and elegant rooms with period furnishings.',
                'address' => 'Castle Hill',
                'city' => 'Edinburgh',
                'state' => 'Scotland',
                'country' => 'UK',
                'postal_code' => 'EH1 2NG',
                'phone' => '+44-131-555-0123',
                'email' => 'info@historiccastle.com',
                'max_guest' => 6,
                'bathroom' => 3,
                'bedroom' => 3,
                'room_type_id' => $roomTypes->random()->id,
                'status' => 'active',
                'sort_order' => 5,
                'featured_image' => 'accommodation_historic_castle.jpg',
                'gallery' => [
                    'accommodation_historic_castle_1.jpg',
                    'accommodation_historic_castle_2.jpg',
                    'accommodation_historic_castle_3.jpg'
                ],
                'amenities' => [
                    'Historic Tours', 'Traditional Restaurant', 'Wine Cellar', 'Garden',
                    'Library', 'Drawing Room', 'Concierge', 'Free WiFi'
                ],
                'price' => 449.99,
                'meta_title' => 'Historic Castle Hotel - Medieval Luxury Accommodation',
                'meta_description' => 'Stay in our medieval castle transformed into a luxury hotel with guided tours and traditional dining.',
                'meta_keywords' => 'castle hotel, historic accommodation, medieval luxury, guided tours',
            ],
            [
                'name' => 'Desert Oasis Resort',
                'description' => 'Luxurious desert resort with stunning sand dunes and star-filled skies. Features camel rides, desert safaris, traditional Bedouin experiences, and world-class spa treatments.',
                'address' => 'Desert Highway',
                'city' => 'Dubai',
                'state' => 'Dubai',
                'country' => 'UAE',
                'postal_code' => '00000',
                'phone' => '+971-4-555-0123',
                'email' => 'info@desertoasis.com',
                'max_guest' => 4,
                'bathroom' => 2,
                'bedroom' => 2,
                'room_type_id' => $roomTypes->random()->id,
                'status' => 'active',
                'sort_order' => 6,
                'featured_image' => 'accommodation_desert_oasis.jpg',
                'gallery' => [
                    'accommodation_desert_oasis_1.jpg',
                    'accommodation_desert_oasis_2.jpg',
                    'accommodation_desert_oasis_3.jpg'
                ],
                'amenities' => [
                    'Desert Safaris', 'Camel Rides', 'Stargazing', 'Spa & Wellness',
                    'Traditional Dining', 'Swimming Pool', 'Fitness Center', 'Free WiFi'
                ],
                'price' => 399.99,
                'meta_title' => 'Desert Oasis Resort - Luxury Desert Accommodation',
                'meta_description' => 'Experience luxury in our desert resort with camel rides, desert safaris, and stunning sand dunes.',
                'meta_keywords' => 'desert resort, luxury accommodation, camel rides, desert safaris',
            ],
        ];

        foreach ($accommodations as $accommodationData) {
            Accommodation::create($accommodationData);
        }

        $this->command->info('Accommodations seeded successfully!');
    }
}
