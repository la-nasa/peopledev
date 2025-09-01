<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('services.index', compact('services'));
    }

    // app/Http/Controllers/ServiceController.php
    public function show($id)
    {
        $service = Service::where('is_active', true)->findOrFail($id);
        
        // Ajouter cette ligne pour récupérer les autres services
        $otherServices = Service::where('is_active', true)
            ->where('id', '!=', $id)
            ->orderBy('order', 'asc')
            ->take(3)
            ->get();
        
        return view('services.show', compact('service', 'otherServices'));
    }
}