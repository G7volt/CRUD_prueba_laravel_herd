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
        Post::factory(10) -> create();
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'category' => $this->faker->word(),
            'published_at' => $this->faker->dateTime()
        ];
    }
}
