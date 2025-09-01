<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraphs(2, true),
            'icon' => $this->faker->randomElement(['fas fa-code', 'fas fa-paint-brush', 'fas fa-chart-line', 'fas fa-mobile-alt', 'fas fa-server', 'fas fa-shield-alt']),
            'order' => $this->faker->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}