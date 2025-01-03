<?php

namespace Database\Factories;

use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Story::class;


    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'text' => implode(' ', $this->faker->sentences(rand(1, 100))),
            'is_moderated' => $this->faker->boolean, // Возвращает 0 или 1
            'created_at' => $this->faker->dateTime()->format('Y-m-d H:i:s')
        ];
    }
}
