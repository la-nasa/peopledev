@extends('layouts.app')

@section('title', __('messages.Contact us') . ' - People Dev')
@section('meta_title', __('messages.Contact us') . ' - People Dev')
@section('meta_description', __('messages.Get in touch with us for your projects'))

@section('content')
<section class="contact-page">
    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">{{ __('messages.Contact us') }}</h1>
            <p data-aos="fade-down" data-aos-delay="200">{{ __('messages.Get in touch with us for your projects') }}</p>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info" data-aos="fade-right">
                    <h2>{{ __('messages.Get in touch') }}</h2>
                    <p>{{ __('messages.We would love to hear from you') }}</p>

                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>{{ __('messages.Address') }}</h3>
                                <p>123 Rue du Développement, Ville</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                <h3>{{ __('messages.Phone') }}</h3>
                                <p>+123 456 7890</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h3>{{ __('messages.Email') }}</h3>
                                <p>info@peopledev.com</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-text">
                                <h3>{{ __('messages.Working hours') }}</h3>
                                <p>{{ __('messages.Mon - Fri: 9AM - 6PM') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="social-links-contact">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="contact-form-container" data-aos="fade-left">
                    <div class="contact-form-card">
                        <h2>{{ __('messages.Send us a message') }}</h2>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                            @csrf

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">{{ __('messages.Name') }} *</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('messages.Email') }} *</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone">{{ __('messages.Phone') }}</label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="subject">{{ __('messages.Subject') }} *</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required>
                                @error('subject')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="message">{{ __('messages.Message') }} *</label>
                                <textarea name="message" id="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-full">
                                {{ __('messages.Send message') }} <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-map" data-aos="fade-up">
        <div class="container">
            <h2>{{ __('messages.Find us here') }}</h2>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937595!2d2.292292615674389!3d48.85837007928746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sEiffel%20Tower!5e0!3m2!1sen!2sfr!4v1620223333333!5m2!1sen!2sfr"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection
