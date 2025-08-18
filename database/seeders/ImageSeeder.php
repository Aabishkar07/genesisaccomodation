<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating placeholder images for seeded data...');

        // Create uploads directory if it doesn't exist
        $uploadsPath = public_path('uploads');
        if (!File::exists($uploadsPath)) {
            File::makeDirectory($uploadsPath, 0755, true);
        }

        // Generate accommodation images
        $this->generateAccommodationImages();

        // Generate blog images
        $this->generateBlogImages();

        // Generate testimonial images
        $this->generateTestimonialImages();

        $this->command->info('Placeholder images generated successfully!');
    }

    private function generateAccommodationImages()
    {
        $accommodationImages = [
            'accommodation_sunset_beach_resort.jpg',
            'accommodation_sunset_beach_1.jpg',
            'accommodation_sunset_beach_2.jpg',
            'accommodation_sunset_beach_3.jpg',
            'accommodation_mountain_lodge.jpg',
            'accommodation_mountain_lodge_1.jpg',
            'accommodation_mountain_lodge_2.jpg',
            'accommodation_mountain_lodge_3.jpg',
            'accommodation_urban_boutique.jpg',
            'accommodation_urban_boutique_1.jpg',
            'accommodation_urban_boutique_2.jpg',
            'accommodation_urban_boutique_3.jpg',
            'accommodation_tropical_paradise.jpg',
            'accommodation_tropical_paradise_1.jpg',
            'accommodation_tropical_paradise_2.jpg',
            'accommodation_tropical_paradise_3.jpg',
            'accommodation_historic_castle.jpg',
            'accommodation_historic_castle_1.jpg',
            'accommodation_historic_castle_2.jpg',
            'accommodation_historic_castle_3.jpg',
            'accommodation_desert_oasis.jpg',
            'accommodation_desert_oasis_1.jpg',
            'accommodation_desert_oasis_2.jpg',
            'accommodation_desert_oasis_3.jpg',
        ];

        foreach ($accommodationImages as $imageName) {
            $this->createPlaceholderImage($imageName, 800, 600, 'accommodation');
        }
    }

    private function generateBlogImages()
    {
        $blogImages = [
            'blog_budget_travel_2024.jpg',
            'blog_luxury_trends_2024.jpg',
            'blog_family_travel_2024.jpg',
            'blog_digital_nomad_2024.jpg',
            'blog_seasonal_travel_2024.jpg',
        ];

        foreach ($blogImages as $imageName) {
            $this->createPlaceholderImage($imageName, 1200, 800, 'blog');
        }
    }

    private function generateTestimonialImages()
    {
        $testimonialImages = [
            'testimonial_john_smith.jpg',
            'testimonial_sarah_johnson.jpg',
            'testimonial_michael_brown.jpg',
            'testimonial_emily_davis.jpg',
            'testimonial_david_wilson.jpg',
            'testimonial_lisa_chen.jpg',
            'testimonial_robert_martinez.jpg',
            'testimonial_amanda_thompson.jpg',
            'testimonial_james_anderson.jpg',
            'testimonial_maria_rodriguez.jpg',
        ];

        foreach ($testimonialImages as $imageName) {
            $this->createPlaceholderImage($imageName, 400, 400, 'testimonial');
        }
    }

    private function createPlaceholderImage($filename, $width, $height, $type)
    {
        $filePath = public_path('uploads/' . $filename);

        // Create a simple placeholder image using GD
        if (extension_loaded('gd')) {
            $image = imagecreatetruecolor($width, $height);

            // Set colors based on type
            switch ($type) {
                case 'accommodation':
                    $bgColor = imagecolorallocate($image, 52, 152, 219); // Blue
                    $textColor = imagecolorallocate($image, 255, 255, 255); // White
                    break;
                case 'blog':
                    $bgColor = imagecolorallocate($image, 46, 204, 113); // Green
                    $textColor = imagecolorallocate($image, 255, 255, 255); // White
                    break;
                case 'testimonial':
                    $bgColor = imagecolorallocate($image, 155, 89, 182); // Purple
                    $textColor = imagecolorallocate($image, 255, 255, 255); // White
                    break;
                default:
                    $bgColor = imagecolorallocate($image, 149, 165, 166); // Gray
                    $textColor = imagecolorallocate($image, 255, 255, 255); // White
            }

            // Fill background
            imagefill($image, 0, 0, $bgColor);

            // Add text
            $text = str_replace(['_', '.jpg'], [' ', ''], $filename);
            $text = ucwords($text);

            // Calculate text position to center it
            $fontSize = min($width, $height) / 15;
            $fontFile = 5; // Built-in font

            // Get text dimensions
            $textWidth = imagefontwidth($fontFile) * strlen($text);
            $textHeight = imagefontheight($fontFile);

            // Center text
            $x = ($width - $textWidth) / 2;
            $y = ($height - $textHeight) / 2;

            imagestring($image, $fontFile, $x, $y, $text, $textColor);

            // Save image
            imagejpeg($image, $filePath, 90);
            imagedestroy($image);

            $this->command->info("Created: {$filename}");
        } else {
            // If GD is not available, create a simple text file
            $content = "Placeholder image for: {$filename}\nType: {$type}\nDimensions: {$width}x{$height}";
            File::put($filePath, $content);
            $this->command->info("Created text placeholder: {$filename}");
        }
    }
}
