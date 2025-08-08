<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            'title' => 'Welcome to Genesis Accommodation',
            'subtitle' => 'Your Perfect Stay Awaits',
            'description' => 'Experience luxury and comfort at its finest. Book your stay with us and enjoy world-class amenities.',
            'image' => 'banner_1.jpg',
            'button_text' => 'Book Now',
            'button_link' => '/accommodations',
            'is_active' => true,
            'sort_order' => 1
        ]);

        Banner::create([
            'title' => 'Special Offers',
            'subtitle' => 'Limited Time Deals',
            'description' => 'Take advantage of our special rates and exclusive packages. Book early and save more.',
            'image' => 'banner_2.jpg',
            'button_text' => 'View Offers',
            'button_link' => '/offers',
            'is_active' => true,
            'sort_order' => 2
        ]);

        Banner::create([
            'title' => 'Luxury Rooms',
            'subtitle' => 'Premium Accommodation',
            'description' => 'Discover our range of luxury rooms designed for your ultimate comfort and relaxation.',
            'image' => 'banner_3.jpg',
            'button_text' => 'Explore Rooms',
            'button_link' => '/room-types',
            'is_active' => true,
            'sort_order' => 3
        ]);
    }
}
