@extends('layouts.app')

@section('title', __('messages.Our Services') . ' - People Dev')
@section('meta_title', __('messages.Our Services') . ' - People Dev')
@section('meta_description', __('messages.Discover our range of professional services'))

@section('content')
<section class="services-page">
    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">{{ __('messages.Our Services') }}</h1>
            <p data-aos="fade-down" data-aos-delay="200">{{ __('messages.Discover our range of professional services') }}</p>
        </div>
    </div>

    <div class="services-list">
        <div class="container">
            <div class="services-grid">
                @foreach($services as $service)
                <div class="service-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="service-icon">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->description }}</p>
                    <a href="{{ route('services.show', $service->id) }}" class="service-link">
                        {{ __('messages.Learn more') }} <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="cta-section">
        <div class="container">
            <div class="cta-content" data-aos="zoom-in">
                <h2>{{ __('messages.Ready to start your project?') }}</h2>
                <p>{{ __('messages.Contact us for a free consultation') }}</p>
                <a href="{{ route('contact.index') }}" class="btn btn-primary">
                    {{ __('messages.Get started') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection