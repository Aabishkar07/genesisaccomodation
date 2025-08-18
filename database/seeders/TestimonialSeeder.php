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
        // Clear existing testimonials
        Testimonial::query()->delete();

        $testimonials = [
            [
                'name' => 'John Smith',
                'position' => 'CEO',
                'company' => 'Tech Solutions Inc.',
                'testimonial' => 'Amazing accommodation experience! The service was exceptional and the facilities were top-notch. The staff went above and beyond to ensure our comfort. The location was perfect for our business meetings, and the amenities exceeded our expectations. Highly recommended for anyone looking for quality accommodation.',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 1,
                'image' => 'testimonial_john_smith.jpg',
                'meta_title' => 'John Smith - CEO Testimonial',
                'meta_description' => 'Read John Smith\'s review of our exceptional accommodation service and top-notch facilities.',
                'meta_keywords' => 'CEO testimonial, accommodation review, exceptional service',
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Marketing Manager',
                'company' => 'Global Marketing',
                'testimonial' => 'I had a wonderful stay here. The staff was incredibly friendly and attentive, the rooms were spotlessly clean, and the location was absolutely perfect for exploring the city. The breakfast buffet was delicious and the spa services were rejuvenating. Will definitely return on my next business trip!',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 2,
                'image' => 'testimonial_sarah_johnson.jpg',
                'meta_title' => 'Sarah Johnson - Marketing Manager Testimonial',
                'meta_description' => 'Sarah Johnson shares her wonderful experience with our friendly staff and perfect location.',
                'meta_keywords' => 'marketing manager testimonial, friendly staff, perfect location',
            ],
            [
                'name' => 'Michael Brown',
                'position' => 'Business Consultant',
                'company' => 'Brown Consulting',
                'testimonial' => 'Professional service and excellent amenities throughout our stay. The accommodation exceeded my expectations in every way. The conference facilities were state-of-the-art, the dining options were diverse and delicious, and the rooms were spacious and comfortable. Great value for money.',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 3,
                'image' => 'testimonial_michael_brown.jpg',
                'meta_title' => 'Michael Brown - Business Consultant Testimonial',
                'meta_description' => 'Michael Brown reviews our professional service and excellent amenities that exceeded expectations.',
                'meta_keywords' => 'business consultant testimonial, professional service, excellent amenities',
            ],
            [
                'name' => 'Emily Davis',
                'position' => 'Travel Blogger',
                'company' => 'Wanderlust Blog',
                'testimonial' => 'Perfect location, comfortable rooms, and outstanding service. This place has everything you need for a relaxing stay. The rooftop pool offered stunning city views, the restaurant served authentic local cuisine, and the concierge helped us discover hidden gems in the area. A truly memorable experience!',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 4,
                'image' => 'testimonial_emily_davis.jpg',
                'meta_title' => 'Emily Davis - Travel Blogger Testimonial',
                'meta_description' => 'Travel blogger Emily Davis shares her memorable experience with our perfect location and outstanding service.',
                'meta_keywords' => 'travel blogger testimonial, perfect location, outstanding service',
            ],
            [
                'name' => 'David Wilson',
                'position' => 'Project Manager',
                'company' => 'Innovation Corp',
                'testimonial' => 'Clean, modern, and well-maintained throughout our entire stay. The staff went above and beyond to make our stay comfortable and memorable. The fitness center was well-equipped, the business center had all the facilities we needed, and the room service was prompt and delicious. Highly recommend!',
                'rating' => 4,
                'status' => 'active',
                'sort_order' => 5,
                'image' => 'testimonial_david_wilson.jpg',
                'meta_title' => 'David Wilson - Project Manager Testimonial',
                'meta_description' => 'David Wilson recommends our clean, modern facilities and exceptional staff service.',
                'meta_keywords' => 'project manager testimonial, clean facilities, exceptional service',
            ],
            [
                'name' => 'Lisa Chen',
                'position' => 'Architect',
                'company' => 'Design Studio',
                'testimonial' => 'As someone who appreciates good design, I was blown away by the architectural beauty of this property. The attention to detail in every corner, from the lobby to the guest rooms, was impressive. The sustainable design elements and local art integration made our stay both beautiful and meaningful.',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 6,
                'image' => 'testimonial_lisa_chen.jpg',
                'meta_title' => 'Lisa Chen - Architect Testimonial',
                'meta_description' => 'Architect Lisa Chen praises our architectural beauty and attention to design detail.',
                'meta_keywords' => 'architect testimonial, architectural beauty, design detail',
            ],
            [
                'name' => 'Robert Martinez',
                'position' => 'Chef',
                'company' => 'Culinary Institute',
                'testimonial' => 'The culinary experience here was exceptional! The in-house restaurant served dishes that rivaled some of the best restaurants I\'ve visited. Fresh, locally-sourced ingredients, innovative menu options, and impeccable presentation. The cooking classes were also a highlight of our stay.',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 7,
                'image' => 'testimonial_robert_martinez.jpg',
                'meta_title' => 'Robert Martinez - Chef Testimonial',
                'meta_description' => 'Chef Robert Martinez reviews our exceptional culinary experience and locally-sourced ingredients.',
                'meta_keywords' => 'chef testimonial, culinary experience, locally-sourced ingredients',
            ],
            [
                'name' => 'Amanda Thompson',
                'position' => 'Yoga Instructor',
                'company' => 'Wellness Center',
                'testimonial' => 'This was the perfect wellness retreat! The spa facilities were world-class, the meditation garden was peaceful, and the wellness programs were thoughtfully designed. The staff understood the importance of creating a serene environment. I left feeling completely rejuvenated.',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 8,
                'image' => 'testimonial_amanda_thompson.jpg',
                'meta_title' => 'Amanda Thompson - Yoga Instructor Testimonial',
                'meta_description' => 'Yoga instructor Amanda Thompson shares her perfect wellness retreat experience.',
                'meta_keywords' => 'yoga instructor testimonial, wellness retreat, spa facilities',
            ],
            [
                'name' => 'James Anderson',
                'position' => 'Adventure Guide',
                'company' => 'Outdoor Adventures',
                'testimonial' => 'Perfect base camp for our outdoor adventures! The location provided easy access to hiking trails, the gear storage was secure, and the staff was knowledgeable about local activities. After long days in nature, returning to such comfortable accommodations was a real treat.',
                'rating' => 4,
                'status' => 'active',
                'sort_order' => 9,
                'image' => 'testimonial_james_anderson.jpg',
                'meta_title' => 'James Anderson - Adventure Guide Testimonial',
                'meta_description' => 'Adventure guide James Anderson recommends our perfect base camp for outdoor adventures.',
                'meta_keywords' => 'adventure guide testimonial, outdoor adventures, hiking trails',
            ],
            [
                'name' => 'Maria Rodriguez',
                'position' => 'Event Planner',
                'company' => 'Celebrations Events',
                'testimonial' => 'We hosted a corporate event here and everything was flawless. The event spaces were versatile, the catering was exceptional, and the staff handled every detail professionally. Our clients were impressed, and the venue contributed significantly to the success of our event.',
                'rating' => 5,
                'status' => 'active',
                'sort_order' => 10,
                'image' => 'testimonial_maria_rodriguez.jpg',
                'meta_title' => 'Maria Rodriguez - Event Planner Testimonial',
                'meta_description' => 'Event planner Maria Rodriguez praises our flawless corporate event hosting and exceptional catering.',
                'meta_keywords' => 'event planner testimonial, corporate events, exceptional catering',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        $this->command->info('Testimonials seeded successfully!');
    }
}
