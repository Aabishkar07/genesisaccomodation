<?php

namespace Database\Seeders;

use App\Models\Display;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            ['name' => 'accommodation', 'status' => 1],
            ['name' => 'blog', 'status' => 0],
            ['name' => 'testimonial', 'status' => 0],
        ];

        foreach ($sections as $section) {
            Display::updateOrCreate(
                ['name' => $section['name']],
                ['status' => $section['status']]
            );
        }
    }
}
