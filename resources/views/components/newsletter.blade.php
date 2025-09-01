<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-content" data-aos="fade-up">
            <h2 class="newsletter-title">{{ __('messages.Stay informed') }}</h2>
            <p class="newsletter-description">{{ __('messages.Subscribe to our newsletter for latest updates and tips') }}</p>

            <form class="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="{{ __('messages.Your email address') }}" required>
                    <button type="submit" class="btn btn-primary">
                        <span>{{ __('messages.Subscribe') }}</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
                @error('email')
                <span class="error-message">{{ $message }}</span>
                @enderror

                @if(session('newsletter_success'))
                <div class="success-message">
                    {{ session('newsletter_success') }}
                </div>
                @endif
            </form>

            <p class="newsletter-privacy">
                {{ __('messages.We respect your privacy and will never share your information') }}
            </p>
        </div>
    </div>
</section>

@push('styles')
<style>
.newsletter-section {
    background: linear-gradient(135deg, var(--primary-blue) 0%, #1A2C6E 100%);
    padding: 80px 0;
    color: white;
}

.newsletter-content {
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
}

.newsletter-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.newsletter-description {
    font-size: 1.1rem;
    margin-bottom: 40px;
    opacity: 0.9;
}

.newsletter-form {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.newsletter-form .form-group {
    display: flex;
    gap: 15px;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.newsletter-form input {
    flex: 1;
    padding: 15px 20px;
    border: none;
    border-radius: 50px;
    font-size: 1rem;
    outline: none;
}

.newsletter-form button {
    padding: 15px 30px;
    border-radius: 50px;
    border: none;
    background: var(--accent-orange);
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.newsletter-form button:hover {
    background: #e55a2b;
    transform: translateY(-2px);
}

.error-message {
    color: #ff6b6b;
    margin-top: 10px;
    display: block;
}

.success-message {
    color: #51cf66;
    margin-top: 10px;
    display: block;
    font-weight: 500;
}

.newsletter-privacy {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-top: 20px;
}

@media (max-width: 768px) {
    .newsletter-form .form-group {
        flex-direction: column;
    }

    .newsletter-form input,
    .newsletter-form button {
        width: 100%;
    }

    .newsletter-title {
        font-size: 2rem;
    }
}
</style>
@endpush
