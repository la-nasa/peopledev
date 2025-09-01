@extends('layouts.app')

@section('title', $project->title . ' - People Dev')
@section('meta_title', $project->title . ' - People Dev')
@section('meta_description', Str::limit($project->description, 160))

@section('content')
<section class="project-detail">
    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">{{ $project->title }}</h1>
            <p data-aos="fade-down" data-aos-delay="200">{{ $project->category }}</p>
        </div>
    </div>

    <div class="project-content">
        <div class="container">
            <div class="project-hero" data-aos="fade-up">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="project-main-image">
            </div>

            <div class="project-details">
                <div class="project-info" data-aos="fade-right">
                    <h2>{{ __('messages.Project Overview') }}</h2>
                    <div class="project-description">
                        {!! nl2br(e($project->description)) !!}
                    </div>

                    @if($project->project_url)
                    <div class="project-link">
                        <a href="{{ $project->project_url }}" target="_blank" class="btn btn-primary">
                            {{ __('messages.Visit website') }} <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                    @endif
                </div>

                <div class="project-meta" data-aos="fade-left">
                    <div class="meta-card">
                        <h3>{{ __('messages.Project Details') }}</h3>
                        <div class="meta-item">
                            <strong>{{ __('messages.Category') }}:</strong>
                            <span>{{ $project->category }}</span>
                        </div>
                        <div class="meta-item">
                            <strong>{{ __('messages.Client') }}:</strong>
                            <span>{{ $project->client ?? __('messages.Confidential') }}</span>
                        </div>
                        <div class="meta-item">
                            <strong>{{ __('messages.Date') }}:</strong>
                            <span>{{ $project->project_date->format('F Y') }}</span>
                        </div>
                    </div>

                    <div class="cta-card">
                        <h3>{{ __('messages.Interested in similar projects?') }}</h3>
                        <p>{{ __('messages.Contact us for a consultation') }}</p>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary">
                            {{ __('messages.Get in touch') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="related-projects">
        <div class="container">
            <h2 data-aos="fade-up">{{ __('messages.Related Projects') }}</h2>
            <div class="projects-grid">
                @foreach($relatedProjects as $relatedProject)
                <div class="project-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="project-image">
                        <img src="{{ asset('storage/' . $relatedProject->image) }}" alt="{{ $relatedProject->title }}" loading="lazy">
                        <div class="project-overlay">
                            <div class="project-info">
                                <h3>{{ $relatedProject->title }}</h3>
                                <p>{{ $relatedProject->category }}</p>
                                <a href="{{ route('projects.show', $relatedProject->id) }}" class="project-view-btn">
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
