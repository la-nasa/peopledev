<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamMemberFactory extends Factory
{
    public function definition()
    {
        $positions = ['Développeur Web', 'Designer UI/UX', 'Spécialiste Marketing', 'Chef de Projet', 'Développeur Mobile'];
        
        return [
            'name' => $this->faker->name,
            'position' => $this->faker->randomElement($positions),
            'bio' => $this->faker->paragraphs(2, true),
            'photo' => 'team/member-' . $this->faker->numberBetween(1, 8) . '.jpg',
            'order' => $this->faker->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}