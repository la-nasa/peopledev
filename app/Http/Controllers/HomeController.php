<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Statistic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('order', 'asc')->take(6)->get();
        $projects = Project::where('is_active', true)->orderBy('order', 'asc')->take(6)->get();
        $testimonials = Testimonial::where('is_active', true)->get();
        $statistics = Statistic::where('is_active', true)->orderBy('order', 'asc')->get();

        return view('home', compact('services', 'projects', 'testimonials', 'statistics'));
    }
}