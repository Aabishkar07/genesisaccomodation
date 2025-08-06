<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'John Smith',
                'position' => 'CEO',
                'company' => 'Tech Solutions Inc.',
                'testimonial' => 'Amazing accommodation experience! The service was exceptional and the facilities were top-notch. Highly recommended for anyone looking for quality accommodation.',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 1,
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Marketing Manager',
                'company' => 'Global Marketing',
                'testimonial' => 'I had a wonderful stay here. The staff was friendly, the rooms were clean, and the location was perfect. Will definitely return!',
                'rating' => 4,
                'status' => 'active',
                'sort_order' => 2,
            ],
            [
                'name' => 'Michael Brown',
                'position' => 'Business Consultant',
                'company' => 'Brown Consulting',
                'testimonial' => 'Professional service and excellent amenities. The accommodation exceeded my expectations. Great value for money.',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 3,
            ],
            [
                'name' => 'Emily Davis',
                'position' => 'Travel Blogger',
                'company' => 'Wanderlust Blog',
                'testimonial' => 'Perfect location, comfortable rooms, and outstanding service. This place has everything you need for a relaxing stay.',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 4,
            ],
            [
                'name' => 'David Wilson',
                'position' => 'Project Manager',
                'company' => 'Innovation Corp',
                'testimonial' => 'Clean, modern, and well-maintained. The staff went above and beyond to make our stay comfortable. Highly recommend!',
                'rating' => 4,
                'status' => 'active',
                'sort_order' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
