<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = $this->faker->numberBetween(1, 3);
        $title = $this->faker->words(3, true);
        $excerpt = $this->faker->paragraph();
        $content = $excerpt.' '.$this->faker->paragraph(5);

        return [
            'user_id' => $user_id,
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $excerpt,
            'content' => $content,
            'image_url' => 'https://picsum.photos/640/480?random=' . $this->faker->unique()->numberBetween(1, 10000),
            'image_medium_url' => 'https://picsum.photos/320/240?random=' . $this->faker->unique()->numberBetween(1, 10000),
            'is_published' => 1,
            'published_at' => now(),
            'created_at' => now(),
        ];
    }
}
