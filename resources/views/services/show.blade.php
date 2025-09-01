@extends('layouts.app')

@section('title', $service->title . ' - People Dev')
@section('meta_title', $service->title . ' - People Dev')
@section('meta_description', Str::limit($service->description, 160))

@section('content')
<section class="service-detail">
    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">{{ $service->title }}</h1>
            <p data-aos="fade-down" data-aos-delay="200">{{ __('messages.Professional service') }}</p>
        </div>
    </div>

    <div class="service-content">
        <div class="container">
            <div class="service-detail-grid">
                <div class="service-info" data-aos="fade-right">
                    <div class="service-icon-large">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <h2>{{ $service->title }}</h2>
                    <div class="service-description">
                        {!! nl2br(e($service->description)) !!}
                    </div>
                </div>

                <div class="service-sidebar" data-aos="fade-left">
                    <div class="sidebar-card">
                        <h3>{{ __('messages.Interested in this service?') }}</h3>
                        <p>{{ __('messages.Contact us for more information') }}</p>
                        <a href="{{ route('contact.index') }}?service={{ $service->id }}" class="btn btn-primary">
                            {{ __('messages.Contact us') }}
                        </a>
                    </div>

                    <div class="sidebar-card">
                        <h3>{{ __('messages.Other services') }}</h3>
                        <ul class="other-services">
                            @foreach($otherServices as $otherService)
                            <li>
                                <a href="{{ route('services.show', $otherService->id) }}">
                                    <i class="{{ $otherService->icon }}"></i>
                                    {{ $otherService->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection