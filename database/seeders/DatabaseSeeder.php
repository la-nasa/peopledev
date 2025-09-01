<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Créer 6 services
        \App\Models\Service::factory()->count(6)->create();
        
        // Créer 12 projets
        \App\Models\Project::factory()->count(12)->create();
        
        // Créer 8 articles de blog
        \App\Models\BlogPost::factory()->count(8)->create();
        
        // Créer 5 témoignages
        \App\Models\Testimonial::factory()->count(5)->create();
        
        // Créer 6 membres d'équipe
        \App\Models\TeamMember::factory()->count(6)->create();
        
        // Créer 4 statistiques
        \App\Models\Statistic::factory()->count(4)->create();
        
        // Créer un utilisateur admin
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@peopledev.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
    }
}