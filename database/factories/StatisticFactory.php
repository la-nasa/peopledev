<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatisticFactory extends Factory
{
    public function definition()
    {
        $titles = ['Projets réalisés', 'Clients satisfaits', 'Ans d\'expérience', 'Développeurs'];
        $icons = ['fas fa-briefcase', 'fas fa-smile', 'fas fa-calendar-alt', 'fas fa-users'];
        
        return [
            'title' => $this->faker->randomElement($titles),
            'value' => $this->faker->numberBetween(10, 200),
            'icon' => $this->faker->randomElement($icons),
            'order' => $this->faker->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}