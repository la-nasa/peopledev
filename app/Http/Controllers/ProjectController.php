<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // app/Http/Controllers/ProjectController.php
    public function index()
    {
        $projects = Project::where('is_active', true)->orderBy('order', 'asc')->get();
        
        // Ajouter cette ligne pour récupérer les catégories uniques
        $categories = Project::where('is_active', true)
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values();
        
        return view('projects.index', compact('projects', 'categories'));
    }

    // app/Http/Controllers/ProjectController.php
    public function show($id)
    {
        $project = Project::where('is_active', true)->findOrFail($id);
        
        // Ajouter cette ligne pour récupérer les projets similaires
        $relatedProjects = Project::where('is_active', true)
            ->where('id', '!=', $id)
            ->where('category', $project->category)
            ->orderBy('order', 'asc')
            ->take(3)
            ->get();
        
        // Si pas assez de projets dans la même catégorie, prendre d'autres projets
        if ($relatedProjects->count() < 3) {
            $additionalProjects = Project::where('is_active', true)
                ->where('id', '!=', $id)
                ->whereNotIn('id', $relatedProjects->pluck('id'))
                ->orderBy('order', 'asc')
                ->take(3 - $relatedProjects->count())
                ->get();
            
            $relatedProjects = $relatedProjects->merge($additionalProjects);
        }
        
        return view('projects.show', compact('project', 'relatedProjects'));
    }
}