<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition()
    {
        $categories = ['Développement Web', 'Application Mobile', 'Design UI/UX', 'E-commerce', 'Marketing Digital'];
        
        return [
            'title' => $this->faker->words(4, true),
            'description' => $this->faker->paragraphs(3, true),
            'image' => 'projects/project-' . $this->faker->numberBetween(1, 10) . '.jpg',
            'category' => $this->faker->randomElement($categories),
            'client' => $this->faker->company,
            'project_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'project_url' => $this->faker->url,
            'order' => $this->faker->numberBetween(1, 20),
            'is_active' => true,
        ];
    }
}