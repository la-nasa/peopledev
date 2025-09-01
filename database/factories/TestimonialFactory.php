<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    public function definition()
    {
        return [
            'client_name' => $this->faker->name,
            'client_position' => $this->faker->jobTitle,
            'content' => $this->faker->paragraphs(2, true),
            'rating' => $this->faker->numberBetween(4, 5),
            'is_active' => true,
        ];
    }
}