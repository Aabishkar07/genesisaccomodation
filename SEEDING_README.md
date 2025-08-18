# Database Seeding Guide

This guide explains how to seed your database with comprehensive test data for accommodations, blogs, and testimonials.

## What's Included

### 1. Accommodations (6 properties)
- **Sunset Beach Resort & Spa** - Miami, Florida (Luxury beachfront resort)
- **Mountain View Lodge & Cabins** - Aspen, Colorado (Rustic mountain lodge)
- **Urban Boutique Hotel & Suites** - New York, NY (Modern city hotel)
- **Tropical Paradise Resort** - Bali, Indonesia (Exotic island resort)
- **Historic Castle Hotel** - Edinburgh, Scotland (Medieval castle hotel)
- **Desert Oasis Resort** - Dubai, UAE (Luxury desert resort)

Each accommodation includes:
- Detailed descriptions
- Contact information
- Geographic coordinates
- Featured images and gallery images
- Amenities list
- Price range and ratings

### 2. Blogs (5 articles)
- **Top 10 Hidden Gems for Budget Travelers in 2024**
- **Luxury Accommodation Trends: What's Hot in 2024**
- **Family-Friendly Accommodations: Making Travel with Kids Easier**
- **Digital Nomad Guide: Best Accommodations for Remote Workers**
- **Seasonal Travel: When to Book Your Dream Accommodation**

Each blog includes:
- Rich HTML content
- SEO meta information
- Featured images
- Author information
- Publication dates

### 3. Testimonials (10 reviews)
- Diverse guest profiles (CEOs, Travel Bloggers, Chefs, etc.)
- Detailed feedback with specific experiences
- Ratings and verification status
- Stay dates and accommodation types
- Profile images

### 4. Images
- **Accommodation images**: 800x600px (blue theme)
- **Blog images**: 1200x800px (green theme)
- **Testimonial images**: 400x400px (purple theme)
- Automatically generated placeholder images with descriptive text

## How to Run

### Option 1: Run all seeders at once
```bash
php artisan db:seed
```

### Option 2: Run individual seeders
```bash
# Seed accommodations
php artisan db:seed --class=AccommodationSeeder

# Seed blogs
php artisan db:seed --class=BlogSeeder

# Seed testimonials
php artisan db:seed --class=TestimonialSeeder

# Generate placeholder images
php artisan db:seed --class=ImageSeeder
```

### Option 3: Run specific seeders in order
```bash
php artisan db:seed --class=RoomTypeSeeder
php artisan db:seed --class=AccommodationSeeder
php artisan db:seed --class=BlogSeeder
php artisan db:seed --class=TestimonialSeeder
php artisan db:seed --class=ImageSeeder
```

## Prerequisites

Before running the seeders, ensure you have:

1. **Database migrations** completed
2. **RoomTypeSeeder** run first (for accommodations to reference)
3. **GD extension** installed (for image generation) - optional

## Database Structure

The seeders will populate these tables:
- `accommodations` - Hotel/resort information
- `blogs` - Travel and accommodation articles
- `testimonials` - Guest reviews and feedback
- `room_types` - Types of rooms available

## Image Generation

The `ImageSeeder` automatically creates:
- Placeholder images for all seeded content
- Color-coded themes for different content types
- Proper dimensions for different use cases
- Fallback text files if GD extension is unavailable

## Customization

You can modify the seeders to:
- Add more accommodations, blogs, or testimonials
- Change image dimensions or colors
- Modify content to match your brand
- Add more fields or relationships

## Troubleshooting

### Common Issues

1. **"No room types found" error**
   - Run `RoomTypeSeeder` first
   - Ensure room types exist in the database

2. **Image generation fails**
   - Check if GD extension is installed
   - Ensure `public/uploads` directory is writable
   - Check file permissions

3. **Database errors**
   - Verify all required fields exist in migrations
   - Check if models have proper fillable fields
   - Ensure database connection is working

### Reset and Re-seed

To start fresh:
```bash
php artisan migrate:fresh --seed
```

This will:
- Drop all tables
- Re-run all migrations
- Execute all seeders in the correct order

## Notes

- All seeded data is realistic and suitable for production demos
- Images are automatically generated placeholders
- Content follows SEO best practices
- Data includes proper relationships and foreign keys
- All entries have appropriate status and sort order values 
