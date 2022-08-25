<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => 1,
            'title' => $this->faker->sentence,
            'excerpt' => collect($this->faker->paragraphs(2))->map(fn ($item) => "<p>$item</p>")->implode(''),
            'body' => collect($this->faker->paragraph(7))->map(fn ($item) => "<p>$item</p>")->implode(''),
            'slug' => $this->faker->slug
        ];
    }
}
