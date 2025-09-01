@extends('layouts.app')

@section('title', __('messages.Our Projects') . ' - People Dev')
@section('meta_title', __('messages.Our Projects') . ' - People Dev')
@section('meta_description', __('messages.Discover our portfolio of successful projects'))

@section('content')
<section class="projects-page">
    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">{{ __('messages.Our Projects') }}</h1>
            <p data-aos="fade-down" data-aos-delay="200">{{ __('messages.Discover our portfolio of successful projects') }}</p>
        </div>
    </div>

    <div class="projects-filter">
        <div class="container">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">{{ __('messages.All') }}</button>
                @foreach($categories as $category)
                <button class="filter-btn" data-filter="{{ Str::slug($category) }}">{{ $category }}</button>
                @endforeach
            </div>
        </div>
    </div>

    <div class="projects-grid-page">
        <div class="container">
            <div class="projects-grid">
                @foreach($projects as $project)
                <div class="project-item" data-category="{{ Str::slug($project->category) }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="project-image">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" loading="lazy">
                        <div class="project-overlay">
                            <div class="project-info">
                                <h3>{{ $project->title }}</h3>
                                <p>{{ $project->category }}</p>
                                <a href="{{ route('projects.show', $project->id) }}" class="project-view-btn">
                                    <i class="fas fa-eye"></i> {{ __('messages.View project') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectItems = document.querySelectorAll('.project-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');

            projectItems.forEach(item => {
                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endpush
