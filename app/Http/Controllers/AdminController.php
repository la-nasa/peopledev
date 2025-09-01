<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Statistic;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('admin');

        view()->composer('admin.partials.sidebar', function ($view) {
        $unreadCount = ContactRequest::where('is_read', false)->count();
        $view->with('unreadCount', $unreadCount);
    });
    }

    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'blog_posts' => BlogPost::count(),
            'testimonials' => Testimonial::count(),
            'team_members' => TeamMember::count(),
            'contact_requests' => ContactRequest::count(),
            'unread_messages' => ContactRequest::where('is_read', false)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    // Services Management
    public function services()
    {
        $services = Service::orderBy('order', 'asc')->get();
        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        Service::create($validated);

        return redirect()->route('admin.services')->with('success', 'Service créé avec succès.');
    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $service->update($validated);

        return redirect()->route('admin.services')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroyService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services')->with('success', 'Service supprimé avec succès.');
    }

    // Projects Management
    public function projects()
    {
        $projects = Project::orderBy('order', 'asc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function createProject()
    {
        return view('admin.projects.create');
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'project_date' => 'required|date',
            'project_url' => 'nullable|url',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        Project::create($validated);

        return redirect()->route('admin.projects')->with('success', 'Projet créé avec succès.');
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'project_date' => 'required|date',
            'project_url' => 'nullable|url',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $project->update($validated);

        return redirect()->route('admin.projects')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Projet supprimé avec succès.');
    }

    // Blog Posts Management
    public function blogPosts()
    {
        $posts = BlogPost::orderBy('publish_date', 'desc')->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function createBlogPost()
    {
        return view('admin.blog.create');
    }

    public function storeBlogPost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string|max:255',
            'author' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'is_published' => 'boolean',
        ]);

        BlogPost::create($validated);

        return redirect()->route('admin.blog')->with('success', 'Article créé avec succès.');
    }

    public function editBlogPost($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
    }

    public function updateBlogPost(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $id,
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string|max:255',
            'author' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'is_published' => 'boolean',
        ]);

        $post->update($validated);

        return redirect()->route('admin.blog')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroyBlogPost($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.blog')->with('success', 'Article supprimé avec succès.');
    }

    // Testimonials Management
    public function testimonials()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function createTestimonial()
    {
        return view('admin.testimonials.create');
    }

    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_active' => 'boolean',
        ]);

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials')->with('success', 'Témoignage créé avec succès.');
    }

    public function editTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function updateTestimonial(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_active' => 'boolean',
        ]);

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials')->with('success', 'Témoignage mis à jour avec succès.');
    }

    public function destroyTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.testimonials')->with('success', 'Témoignage supprimé avec succès.');
    }

    // Team Members Management
    public function teamMembers()
    {
        $members = TeamMember::orderBy('order', 'asc')->get();
        return view('admin.team.index', compact('members'));
    }

    public function createTeamMember()
    {
        return view('admin.team.create');
    }

    public function storeTeamMember(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        TeamMember::create($validated);

        return redirect()->route('admin.team')->with('success', 'Membre d\'équipe créé avec succès.');
    }

    public function editTeamMember($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('admin.team.edit', compact('member'));
    }

    public function updateTeamMember(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $member->update($validated);

        return redirect()->route('admin.team')->with('success', 'Membre d\'équipe mis à jour avec succès.');
    }

    public function destroyTeamMember($id)
    {
        $member = TeamMember::findOrFail($id);
        $member->delete();

        return redirect()->route('admin.team')->with('success', 'Membre d\'équipe supprimé avec succès.');
    }

    // Statistics Management
    public function statistics()
    {
        $statistics = Statistic::orderBy('order', 'asc')->get();
        return view('admin.statistics.index', compact('statistics'));
    }

    public function createStatistic()
    {
        return view('admin.statistics.create');
    }

    public function storeStatistic(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|integer',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        Statistic::create($validated);

        return redirect()->route('admin.statistics')->with('success', 'Statistique créée avec succès.');
    }

    public function editStatistic($id)
    {
        $statistic = Statistic::findOrFail($id);
        return view('admin.statistics.edit', compact('statistic'));
    }

    public function updateStatistic(Request $request, $id)
    {
        $statistic = Statistic::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|integer',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $statistic->update($validated);

        return redirect()->route('admin.statistics')->with('success', 'Statistique mise à jour avec succès.');
    }

    public function destroyStatistic($id)
    {
        $statistic = Statistic::findOrFail($id);
        $statistic->delete();

        return redirect()->route('admin.statistics')->with('success', 'Statistique supprimée avec succès.');
    }

    // Contact Requests Management
    public function contactRequests()
    {
        $requests = ContactRequest::orderBy('created_at', 'desc')->get();
        return view('admin.contact.index', compact('requests'));
    }

    public function showContactRequest($id)
    {
        $request = ContactRequest::findOrFail($id);
        
        // Marquer comme lu
        if (!$request->is_read) {
            $request->update(['is_read' => true]);
        }
        
        return view('admin.contact.show', compact('request'));
    }

    public function destroyContactRequest($id)
    {
        $request = ContactRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('admin.contact')->with('success', 'Demande de contact supprimée avec succès.');
    }
}