@extends('layouts.app')

@section('title', __('messages.Our Team') . ' - People Dev')
@section('meta_title', __('messages.Our Team') . ' - People Dev')
@section('meta_description', __('messages.Meet our talented team of professionals'))

@section('content')
<section class="team-page">
    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">{{ __('messages.Our Team') }}</h1>
            <p data-aos="fade-down" data-aos-delay="200">{{ __('messages.Meet our talented team of professionals') }}</p>
        </div>
    </div>

    <div class="team-content">
        <div class="container">
            <div class="team-grid">
                @foreach($members as $member)
                <div class="team-member" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="member-image">
                        @if($member->photo)
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" loading="lazy">
                        @else
                        <div class="member-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                        @endif
                        <div class="member-overlay">
                            <div class="member-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="member-info">
                        <h3>{{ $member->name }}</h3>
                        <p class="member-position">{{ $member->position }}</p>
                        @if($member->bio)
                        <p class="member-bio">{{ Str::limit($member->bio, 100) }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="team-cta">
        <div class="container">
            <div class="cta-content" data-aos="zoom-in">
                <h2>{{ __('messages.Join our team') }}</h2>
                <p>{{ __('messages.We are always looking for talented individuals') }}</p>
                <a href="{{ route('contact.index') }}?subject=Career" class="btn btn-primary">
                    {{ __('messages.View opportunities') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
