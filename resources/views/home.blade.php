@extends('layouts.app')

@section('title', __('messages.Welcome to People Dev'))
@section('meta_title', __('messages.Welcome to People Dev'))
@section('meta_description', __('messages.Custom solutions to boost your business'))

@section('structured-data')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Organization",
  "name": "People Dev Organisation Software",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('images/logo.png') }}",
  "description": "{{ __('messages.Custom solutions to boost your business') }}",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "123 Rue du Développement",
    "addressLocality": "Ville",
    "addressCountry": "FR"
  },
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "+123-456-7890",
    "contactType": "customer service"
  },
  "sameAs": [
    "https://facebook.com/peopledev",
    "https://twitter.com/peopledev",
    "https://linkedin.com/company/peopledev",
    "https://instagram.com/peopledev"
  ]
}
</script>

@endsection

@push('styles')
<!-- Add Glide.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.5.2/dist/css/glide.core.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.5.2/dist/css/glide.theme.min.css">
<style>
    /* Additional styles for Glide.js customization if needed */
    .glide__arrow {
        border: none;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* Simple responsive helpers (optional) */
    .hero { position: relative; overflow: hidden; }
    #particles-js { position: absolute; inset: 0; z-index: 0; }
    .hero-content { position: relative; z-index: 2; padding: 6rem 0; }
</style>
@endpush

@section('content')
    <!-- Hero Section with Particle Animation -->
    <section class="hero" id="home">
        <div id="particles-js" aria-hidden="true"></div>
        <div class="hero-content">
            <div class="container">
                <h1 class="hero-title" data-aos="fade-down" data-aos-delay="200">
                    <span class="text-gradient">{{ __('messages.Mobile & Web Development') }}</span>
                </h1>
                <p class="hero-subtitle" data-aos="fade-down" data-aos-delay="400">
                    {{ __('messages.Custom solutions to boost your business') }}
                </p>
                <div class="hero-actions" data-aos="fade-up" data-aos-delay="600">
                    <a href="{{ route('services.index') }}" class="btn btn-primary">
                        <span>{{ __('messages.Our Services') }}</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn btn-outline">
                        <span>{{ __('messages.Contact us') }}</span>
                        <i class="fas fa-phone" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="hero-scroll">
            <div class="scroll-indicator" data-aos="fade-up" data-aos-delay="800">
                <span>{{ __('messages.Scroll') }}</span>
                <div class="scroll-line"></div>
            </div>
        </div>
    </section>

    <!-- Stats Section with Counter Animation -->
    @if(isset($statistics) && count($statistics) > 0)
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                @foreach($statistics as $statistic)
                <div class="stat-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="stat-icon">
                        <i class="{{ $statistic->icon ?? 'fas fa-chart-bar' }}" aria-hidden="true"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number" data-count="{{ intval($statistic->value ?? 0) }}">0</h3>
                        <p class="stat-label">{{ $statistic->title ?? 'Statistic' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Services Section with Hover Effects -->
    @if(isset($services) && count($services) > 0)
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">{{ __('messages.Why choose') }} <span class="text-gradient">People Dev</span> ?</h2>
                <p class="section-subtitle">{{ __('messages.Discover our exceptional services') }}</p>
            </div>

            <div class="services-grid">
                @foreach($services as $service)
                <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}">
                    <div class="service-icon">
                        <i class="{{ $service->icon ?? 'fas fa-cog' }}" aria-hidden="true"></i>
                    </div>
                    <h3 class="service-title">{{ $service->title ?? 'Service Title' }}</h3>
                    <p class="service-description">{{ $service->description ?? 'Service description goes here.' }}</p>
                    <div class="service-hover">
                        <a href="{{ route('services.show', $service->id ?? '#') }}" class="service-link">
                            <span>{{ __('messages.Learn more') }}</span>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Projects Showcase Section with Parallax -->
    @if(isset($projects) && count($projects) > 0)
    <section class="projects-section" id="projects">
        <div class="parallax-bg" aria-hidden="true"></div>
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">{{ __('messages.Our Recent Projects') }}</h2>
                <p class="section-subtitle">{{ __('messages.Discover our portfolio') }}</p>
            </div>

            <div class="projects-grid">
                @foreach($projects as $project)
                <div class="project-card" data-aos="flip-left" data-aos-delay="{{ $loop->index * 200 }}">
                    <div class="project-image">
                        <img src="{{ isset($project->image) ? asset('storage/' . $project->image) : asset('images/placeholder-project.jpg') }}"
                             alt="{{ $project->title ?? 'Project' }}" loading="lazy"
                             onerror="this.onerror=null;this.src='{{ asset('images/placeholder-project.jpg') }}'">
                        <div class="project-overlay">
                            <div class="project-info">
                                <h3>{{ $project->title ?? 'Project Title' }}</h3>
                                <p>{{ $project->category ?? 'Category' }}</p>
                                <a href="{{ route('projects.show', $project->id ?? '#') }}" class="project-view-btn" aria-label="View {{ $project->title ?? 'Project' }} project">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('projects.index') }}" class="btn btn-large">
                    <span>{{ __('messages.View all projects') }}</span>
                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Testimonials Section with Glide Carousel -->
    @if(isset($testimonials) && count($testimonials) > 0)
    <section class="testimonials-section" id="testimonials">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">{{ __('messages.What our clients say') }}</h2>
                <p class="section-subtitle">{{ __('messages.Discover testimonials from satisfied clients') }}</p>
            </div>

            <div class="glide" data-aos="fade-up">
                <div class="glide__track" data-glide-el="track">
                    <div class="glide__slides">
                        @foreach($testimonials as $testimonial)
                        <div class="glide__slide">
                            <div class="testimonial-card">
                                <div class="testimonial-content">
                                    <div class="quote-icon">
                                        <i class="fas fa-quote-left" aria-hidden="true"></i>
                                    </div>
                                    <p>"{{ $testimonial->content ?? 'Client testimonial content goes here.' }}"</p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="author-avatar" aria-hidden="true">
                                        {{ isset($testimonial->client_name) ? substr($testimonial->client_name, 0, 1) : 'C' }}
                                    </div>
                                    <div class="author-info">
                                        <h4>{{ $testimonial->client_name ?? 'Client Name' }}</h4>
                                        <p>{{ $testimonial->client_position ?? 'Position' }}</p>
                                        <div class="testimonial-rating" aria-hidden="true">
                                            @for($i = 0; $i < intval($testimonial->rating ?? 5); $i++)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<" aria-label="Previous testimonial">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">" aria-label="Next testimonial">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="glide__bullets" data-glide-el="controls[nav]">
                    @foreach($testimonials as $index => $testimonial)
                    <button class="glide__bullet" data-glide-dir="={{ $index }}" aria-label="Go to testimonial {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section with Gradient Background -->
    <section class="cta-section">
        <div class="cta-background" aria-hidden="true">
            <div class="cta-shape cta-shape-1"></div>
            <div class="cta-shape cta-shape-2"></div>
            <div class="cta-shape cta-shape-3"></div>
        </div>

        <div class="container">
            <div class="cta-content" data-aos="zoom-in">
                <h2 class="cta-title">{{ __('messages.Ready to start your project?') }}</h2>
                <p class="cta-description">{{ __('messages.Contact us for a free audit and a custom proposal') }}</p>
                <div class="cta-actions">
                    <a href="{{ route('contact.index') }}" class="btn btn-light">
                        <span>{{ __('messages.Contact us') }}</span>
                        <i class="fas fa-paper-plane" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-light">
                        <span>{{ __('messages.View our projects') }}</span>
                        <i class="fas fa-briefcase" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content" data-aos="fade-up">
                <h2 class="newsletter-title">{{ __('messages.Stay informed') }}</h2>
                <p class="newsletter-description">{{ __('messages.Subscribe to our newsletter') }}</p>

                <form class="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" placeholder="{{ __('messages.Your email address') }}" required aria-label="Email address">
                        <button type="submit" class="btn btn-primary">
                            <span>{{ __('messages.Subscribe') }}</span>
                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                        </button>
                    </div>
                    @if($errors->has('email'))
                        <div class="newsletter-error" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                    @if(session('newsletter_success'))
                        <div class="newsletter-success" role="status">{{ session('newsletter_success') }}</div>
                    @endif
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<!-- Add Glide.js -->
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.5.2/dist/glide.min.js"></script>
<!-- Add GSAP with ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>

<script>
    // Particles.js, Glide, counter and GSAP initialization
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize particles if the element exists
        if (document.getElementById('particles-js') && typeof particlesJS !== 'undefined') {
            particlesJS('particles-js', {
                particles: {
                    number: {
                        value: 80,
                        density: { enable: true, value_area: 800 }
                    },
                    color: { value: "#3a86ff" },
                    shape: { type: "circle" },
                    opacity: { value: 0.5, random: true },
                    size: { value: 3, random: true },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: "#ffffff",
                        opacity: 0.4,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 2,
                        direction: "none",
                        random: true,
                        straight: false,
                        out_mode: "out",
                        bounce: false
                    }
                },
                interactivity: {
                    detect_on: "canvas",
                    events: {
                        onhover: { enable: true, mode: "grab" },
                        onclick: { enable: true, mode: "push" },
                        resize: true
                    }
                },
                retina_detect: true
            });
        }

        // Initialize Glide carousel only if testimonials exist
        @if(isset($testimonials) && count($testimonials) > 0)
        if (typeof Glide !== 'undefined' && document.querySelector('.glide')) {
            try {
                new Glide('.glide', {
                    type: 'carousel',
                    perView: 1,
                    autoplay: 4000,
                    hoverpause: true,
                    gap: 30,
                    breakpoints: {
                        768: { perView: 1 }
                    }
                }).mount();
            } catch (e) {
                console.error('Glide.js initialization error:', e);
            }
        }
        @endif

        // Counter animation
        const counters = document.querySelectorAll('.stat-number');
        const speed = 200;

        if (counters.length > 0) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-count')) || 0;
                        let count = 0;
                        const increment = Math.max(1, Math.ceil(target / speed));

                        function updateCount() {
                            if (count < target) {
                                count += increment;
                                if (count > target) count = target;
                                counter.innerText = count.toLocaleString();
                                setTimeout(updateCount, 15);
                            } else {
                                counter.innerText = target.toLocaleString();
                            }
                        }

                        updateCount();
                        observer.unobserve(counter);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => observer.observe(counter));
        }

        // GSAP animations (if available)
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            try {
                gsap.registerPlugin(ScrollTrigger);

                // Animate service cards on scroll
                gsap.utils.toArray('.service-card').forEach(card => {
                    gsap.fromTo(card,
                        { y: 100, opacity: 0 },
                        {
                            y: 0,
                            opacity: 1,
                            duration: 0.8,
                            scrollTrigger: {
                                trigger: card,
                                start: "top 85%",
                                toggleActions: "play none none reverse"
                            }
                        }
                    );
                });

                // Parallax effect for projects section
                if (document.querySelector('.parallax-bg')) {
                    gsap.to('.parallax-bg', {
                        yPercent: 30,
                        ease: "none",
                        scrollTrigger: {
                            trigger: '.projects-section',
                            start: "top bottom",
                            end: "bottom top",
                            scrub: true
                        }
                    });
                }
            } catch (e) {
                console.error('GSAP initialization error:', e);
            }
        }
    });
</script>

@endpush
