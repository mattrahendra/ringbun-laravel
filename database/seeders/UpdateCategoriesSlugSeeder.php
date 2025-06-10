<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UpdateCategoriesSlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update existing categories dengan slug
        $categories = Category::whereNull('slug')->orWhere('slug', '')->get();

        foreach ($categories as $category) {
            $baseSlug = Str::slug($category->name);
            $slug = $baseSlug;
            $counter = 1;

            // Pastikan slug unik
            while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $category->update(['slug' => $slug]);
        }

        $this->command->info('Categories slug updated successfully!');
    }
}
