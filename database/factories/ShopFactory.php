<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company(),
            'description' => $this->faker->sentence(30),
            'email' => $this->faker->email(),
            'phone' => $this->faker->e164PhoneNumber(),
            'country' => $this->faker->country()
        ];
    }
}
