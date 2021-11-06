<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'excertpt' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(20),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'image' => $this->faker->imageUrl(300, 300, 'animals', true),
            'category_id' => rand(1,10),
        ];
    }
}
