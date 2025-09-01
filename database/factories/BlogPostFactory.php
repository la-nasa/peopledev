<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->sentence(6);
        
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'excerpt' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraphs(10, true),
            'image' => 'blog/blog-' . $this->faker->numberBetween(1, 6) . '.jpg',
            'author' => $this->faker->name,
            'publish_date' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'is_published' => true,
        ];
    }
}