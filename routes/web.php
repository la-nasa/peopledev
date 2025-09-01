<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;


// Newsletter routes
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{email}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Routes d'administration (protégées)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Services
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::get('/services/create', [AdminController::class, 'createService'])->name('services.create');
    Route::post('/services', [AdminController::class, 'storeService'])->name('services.store');
    Route::get('/services/{id}/edit', [AdminController::class, 'editService'])->name('services.edit');
    Route::put('/services/{id}', [AdminController::class, 'updateService'])->name('services.update');
    Route::delete('/services/{id}', [AdminController::class, 'destroyService'])->name('services.destroy');

    // Projects
    Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    Route::get('/projects/create', [AdminController::class, 'createProject'])->name('projects.create');
    Route::post('/projects', [AdminController::class, 'storeProject'])->name('projects.store');
    Route::get('/projects/{id}/edit', [AdminController::class, 'editProject'])->name('projects.edit');
    Route::put('/projects/{id}', [AdminController::class, 'updateProject'])->name('projects.update');
    Route::delete('/projects/{id}', [AdminController::class, 'destroyProject'])->name('projects.destroy');

    // Blog Posts
    Route::get('/blog', [AdminController::class, 'blogPosts'])->name('blog');
    Route::get('/blog/create', [AdminController::class, 'createBlogPost'])->name('blog.create');
    Route::post('/blog', [AdminController::class, 'storeBlogPost'])->name('blog.store');
    Route::get('/blog/{id}/edit', [AdminController::class, 'editBlogPost'])->name('blog.edit');
    Route::put('/blog/{id}', [AdminController::class, 'updateBlogPost'])->name('blog.update');
    Route::delete('/blog/{id}', [AdminController::class, 'destroyBlogPost'])->name('blog.destroy');

    // Testimonials
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('testimonials');
    Route::get('/testimonials/create', [AdminController::class, 'createTestimonial'])->name('testimonials.create');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('testimonials.store');
    Route::get('/testimonials/{id}/edit', [AdminController::class, 'editTestimonial'])->name('testimonials.edit');
    Route::put('/testimonials/{id}', [AdminController::class, 'updateTestimonial'])->name('testimonials.update');
    Route::delete('/testimonials/{id}', [AdminController::class, 'destroyTestimonial'])->name('testimonials.destroy');

    // Team Members
    Route::get('/team', [AdminController::class, 'teamMembers'])->name('team');
    Route::get('/team/create', [AdminController::class, 'createTeamMember'])->name('team.create');
    Route::post('/team', [AdminController::class, 'storeTeamMember'])->name('team.store');
    Route::get('/team/{id}/edit', [AdminController::class, 'editTeamMember'])->name('team.edit');
    Route::put('/team/{id}', [AdminController::class, 'updateTeamMember'])->name('team.update');
    Route::delete('/team/{id}', [AdminController::class, 'destroyTeamMember'])->name('team.destroy');

    // Statistics
    Route::get('/statistics', [AdminController::class, 'statistics'])->name('statistics');
    Route::get('/statistics/create', [AdminController::class, 'createStatistic'])->name('statistics.create');
    Route::post('/statistics', [AdminController::class, 'storeStatistic'])->name('statistics.store');
    Route::get('/statistics/{id}/edit', [AdminController::class, 'editStatistic'])->name('statistics.edit');
    Route::put('/statistics/{id}', [AdminController::class, 'updateStatistic'])->name('statistics.update');
    Route::delete('/statistics/{id}', [AdminController::class, 'destroyStatistic'])->name('statistics.destroy');

    // Contact Requests
    Route::get('/contact-requests', [AdminController::class, 'contactRequests'])->name('contact');
    Route::get('/contact-requests/{id}', [AdminController::class, 'showContactRequest'])->name('contact.show');
    Route::delete('/contact-requests/{id}', [AdminController::class, 'destroyContactRequest'])->name('contact.destroy');
});

// Authentification Breeze (déjà inclus)
// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::middleware('auth')->group(function () {
        //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // });
require __DIR__.'/auth.php';


