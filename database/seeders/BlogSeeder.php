<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing blogs
        Blog::query()->delete();

        $blogs = [
            [
                'title' => 'Top 10 Hidden Gems for Budget Travelers in 2024',
                'slug' => 'top-10-hidden-gems-budget-travelers-2024',
                'content' => '<p>Discover amazing destinations that won\'t break the bank! From charming European villages to tropical paradises, we\'ve compiled the ultimate list of budget-friendly travel destinations for 2024.</p>

                <h3>1. Porto, Portugal</h3>
                <p>This coastal city offers stunning architecture, delicious wine, and affordable accommodations. The historic center is a UNESCO World Heritage site with colorful buildings and narrow streets.</p>

                <h3>2. Budapest, Hungary</h3>
                <p>Experience the grandeur of Eastern Europe without the high costs. Enjoy thermal baths, historic castles, and vibrant nightlife at a fraction of Western European prices.</p>

                <h3>3. Chiang Mai, Thailand</h3>
                <p>Immerse yourself in Thai culture with temple visits, cooking classes, and mountain adventures. The cost of living is incredibly low, making it perfect for extended stays.</p>

                <p>These destinations prove that amazing travel experiences don\'t have to come with a hefty price tag. Start planning your next adventure today!</p>',
                'excerpt' => 'Discover amazing destinations that won\'t break the bank! From charming European villages to tropical paradises, we\'ve compiled the ultimate list of budget-friendly travel destinations for 2024.',
                'featured_image' => 'blog_budget_travel_2024.jpg',
                'meta_title' => 'Top 10 Hidden Gems for Budget Travelers in 2024',
                'meta_description' => 'Discover amazing budget-friendly travel destinations for 2024. From Porto to Chiang Mai, explore the world without breaking the bank.',
                'meta_keywords' => 'budget travel, hidden gems, affordable destinations, travel 2024, cheap travel',
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'title' => 'Luxury Accommodation Trends: What\'s Hot in 2024',
                'slug' => 'luxury-accommodation-trends-2024',
                'content' => '<p>The luxury accommodation industry is evolving rapidly, with new trends emerging that focus on sustainability, technology, and personalized experiences.</p>

                <h3>Sustainable Luxury</h3>
                <p>Eco-conscious travelers are driving demand for sustainable luxury accommodations. Properties are incorporating renewable energy, organic materials, and zero-waste practices while maintaining high-end comfort.</p>

                <h3>Smart Technology Integration</h3>
                <p>From AI-powered room controls to virtual reality concierge services, technology is enhancing the guest experience in unprecedented ways. Smart rooms that learn guest preferences are becoming standard.</p>

                <h3>Wellness-Focused Amenities</h3>
                <p>Luxury properties are expanding their wellness offerings beyond traditional spas. Think meditation pods, wellness concierges, and personalized fitness programs tailored to individual guests.</p>

                <p>These trends are reshaping what luxury means in the accommodation industry, creating more meaningful and memorable experiences for discerning travelers.</p>',
                'excerpt' => 'The luxury accommodation industry is evolving rapidly, with new trends emerging that focus on sustainability, technology, and personalized experiences.',
                'featured_image' => 'blog_luxury_trends_2024.jpg',
                'meta_title' => 'Luxury Accommodation Trends: What\'s Hot in 2024',
                'meta_description' => 'Discover the latest trends in luxury accommodation including sustainability, smart technology, and wellness-focused amenities.',
                'meta_keywords' => 'luxury accommodation, travel trends, sustainable luxury, smart hotels, wellness travel',
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'title' => 'Family-Friendly Accommodations: Making Travel with Kids Easier',
                'slug' => 'family-friendly-accommodations-travel-kids',
                'content' => '<p>Traveling with children doesn\'t have to be stressful! The right accommodation can make all the difference in creating a memorable family vacation.</p>

                <h3>Essential Amenities for Families</h3>
                <p>Look for properties that offer connecting rooms, kitchenettes, and laundry facilities. These amenities can significantly reduce stress and make your stay more comfortable.</p>

                <h3>Kid-Friendly Activities</h3>
                <p>Many family-oriented accommodations now offer supervised kids\' clubs, playgrounds, and family-friendly dining options. Some even provide babysitting services for parents who want some alone time.</p>

                <h3>Safety Considerations</h3>
                <p>Safety should always be a priority. Choose accommodations with child-proofing options, secure balconies, and pools with proper safety measures.</p>

                <p>With the right planning and accommodation choice, family travel can be enjoyable for everyone. Start researching family-friendly options early to secure the best deals.</p>',
                'excerpt' => 'Traveling with children doesn\'t have to be stressful! The right accommodation can make all the difference in creating a memorable family vacation.',
                'featured_image' => 'blog_family_travel_2024.jpg',
                'meta_title' => 'Family-Friendly Accommodations: Making Travel with Kids Easier',
                'meta_description' => 'Discover how to choose the perfect family-friendly accommodation for stress-free travel with children.',
                'meta_keywords' => 'family travel, kid-friendly hotels, family accommodation, travel with children',
                'status' => 'published',
                'sort_order' => 3,
            ],
            [
                'title' => 'Digital Nomad Guide: Best Accommodations for Remote Workers',
                'slug' => 'digital-nomad-guide-best-accommodations-remote-workers',
                'content' => '<p>As remote work becomes the new normal, digital nomads are seeking accommodations that support their lifestyle. Here\'s what to look for in your next work-from-anywhere destination.</p>

                <h3>High-Speed Internet</h3>
                <p>Reliable, fast internet is non-negotiable for digital nomads. Look for accommodations that offer dedicated workspaces and backup internet options.</p>

                <h3>Work-Friendly Spaces</h3>
                <p>Co-working areas, quiet zones, and ergonomic furniture are essential. Many accommodations now offer dedicated business centers and meeting rooms.</p>

                <h3>Community and Networking</h3>
                <p>Digital nomad-friendly accommodations often host networking events, skill-sharing sessions, and community activities that help you connect with like-minded professionals.</p>

                <p>The perfect digital nomad accommodation combines productivity, comfort, and community. Take your time to find the right fit for your work style and preferences.</p>',
                'excerpt' => 'As remote work becomes the new normal, digital nomads are seeking accommodations that support their lifestyle. Here\'s what to look for in your next work-from-anywhere destination.',
                'featured_image' => 'blog_digital_nomad_2024.jpg',
                'meta_title' => 'Digital Nomad Guide: Best Accommodations for Remote Workers',
                'meta_description' => 'Find the perfect accommodation for digital nomads with high-speed internet, work-friendly spaces, and community features.',
                'meta_keywords' => 'digital nomad, remote work, work from anywhere, nomad accommodation',
                'status' => 'published',
                'sort_order' => 4,
            ],
            [
                'title' => 'Seasonal Travel: When to Book Your Dream Accommodation',
                'slug' => 'seasonal-travel-when-to-book-dream-accommodation',
                'content' => '<p>Timing is everything when it comes to securing the best accommodation deals. Understanding seasonal patterns can save you money and ensure availability.</p>

                <h3>Peak Season Strategies</h3>
                <p>For popular destinations during peak season, book 6-12 months in advance. Consider shoulder season alternatives for better prices and fewer crowds.</p>

                <h3>Off-Season Advantages</h3>
                <p>Traveling during off-peak periods often means lower prices, better availability, and a more authentic local experience. Many accommodations offer special packages during these times.</p>

                <h3>Last-Minute Opportunities</h3>
                <p>While risky, last-minute bookings can sometimes offer significant savings. This strategy works best for flexible travelers who can take advantage of cancellations.</p>

                <p>Strategic timing combined with flexibility can lead to incredible accommodation deals. Plan ahead for peak seasons and stay open to off-season adventures.</p>',
                'excerpt' => 'Timing is everything when it comes to securing the best accommodation deals. Understanding seasonal patterns can save you money and ensure availability.',
                'featured_image' => 'blog_seasonal_travel_2024.jpg',
                'meta_title' => 'Seasonal Travel: When to Book Your Dream Accommodation',
                'meta_description' => 'Learn the best times to book accommodations for different seasons and destinations to save money and secure availability.',
                'meta_keywords' => 'seasonal travel, booking tips, travel timing, accommodation deals',
                'status' => 'published',
                'sort_order' => 5,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

        $this->command->info('Blogs seeded successfully!');
    }
}
