@extends('layouts.app')

@section('title', __('messages.What our clients say') . ' - People Dev')
@section('meta_title', __('messages.What our clients say') . ' - People Dev')
@section('meta_description', __('messages.Discover testimonials from satisfied clients'))

@section('content')
<section class="testimonials-page">
    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">{{ __('messages.What our clients say') }}</h1>
            <p data-aos="fade-down" data-aos-delay="200">{{ __('messages.Discover testimonials from satisfied clients') }}</p>
        </div>
    </div>

    <div class="testimonials-content">
        <div class="container">
            <div class="testimonials-grid">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="testimonial-content">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p class="testimonial-text">"{{ $testimonial->content }}"</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            {{ substr($testimonial->client_name, 0, 1) }}
                        </div>
                        <div class="author-info">
                            <h3 class="author-name">{{ $testimonial->client_name }}</h3>
                            <p class="author-position">{{ $testimonial->client_position }}</p>
                            <div class="testimonial-rating">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $testimonial->rating ? 'active' : '' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="testimonials-cta">
        <div class="container">
            <div class="cta-content" data-aos="zoom-in">
                <h2>{{ __('messages.Share your experience') }}</h2>
                <p>{{ __('messages.Would you like to share your experience with us?') }}</p>
                <a href="{{ route('contact.index') }}?subject=Testimonial" class="btn btn-primary">
                    {{ __('messages.Share your story') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.testimonials-page {
    padding: 80px 0;
}

.page-header {
    text-align: center;
    padding: 60px 0;
    background: linear-gradient(135deg, var(--primary-blue) 0%, #1A2C6E 100%);
    color: white;
}

.page-header h1 {
    font-family: 'Montserrat', sans-serif;
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.page-header p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin: 60px 0;
}

.testimonial-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.quote-icon {
    font-size: 2rem;
    color: var(--accent-orange);
    opacity: 0.3;
    margin-bottom: 20px;
}

.testimonial-text {
    font-size: 1.1rem;
    line-height: 1.6;
    color: var(--dark-text);
    margin-bottom: 25px;
    font-style: italic;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 15px;
}

.author-avatar {
    width: 60px;
    height: 60px;
    background: var(--gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.2rem;
}

.author-info h3 {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.2rem;
    margin-bottom: 5px;
    color: var(--primary-blue);
}

.author-position {
    color: #666;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.testimonial-rating {
    color: #FFD700;
}

.testimonial-rating .fa-star.active {
    color: #FFD700;
}

.testimonial-rating .fa-star:not(.active) {
    color: #ddd;
}

.testimonials-cta {
    background: #f8f9fa;
    padding: 80px 0;
    text-align: center;
}

.cta-content h2 {
    font-family: 'Montserrat', sans-serif;
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: var(--primary-blue);
}

.cta-content p {
    font-size: 1.1rem;
    margin-bottom: 30px;
    color: #666;
}

@media (max-width: 768px) {
    .page-header h1 {
        font-size: 2.2rem;
    }

    .testimonials-grid {
        grid-template-columns: 1fr;
    }

    .testimonial-card {
        padding: 20px;
    }

    .cta-content h2 {
        font-size: 2rem;
    }
}
</style>
@endpush
