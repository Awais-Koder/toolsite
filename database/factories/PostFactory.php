<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
        return [
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'title' => $title = $this->faker->sentence(),
            'slug' => str($title)->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->paragraphs(5, true),
            'is_published' => true,
            'published_at' => now(),
            'meta_title' => $title,
            'meta_description' => $this->faker->sentence(),
        ];
    }
}
