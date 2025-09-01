@include('components.newsletter')
<footer class="footer">
    <div class="container">
        <div class="footer-content" data-aos="fade-up">
            <div class="footer-column">
                <div class="footer-logo">
                    <span class="logo-icon">
                        <i class="fas fa-code"></i>
                    </span>
                    People<span class="logo-highlight">Dev</span>
                </div>
                <p class="footer-description">{{ __('messages.Custom solutions to boost your business') }}</p>
                <div class="social-links">
                    <a href="#" class="social-link" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            <div class="footer-column">
                <h3 class="footer-title">{{ __('messages.Services') }}</h3>
                <ul class="footer-links">
                    <li><a href="#">{{ __('messages.Web Development') }}</a></li>
                    <li><a href="#">{{ __('messages.Mobile Applications') }}</a></li>
                    <li><a href="#">{{ __('messages.UI/UX Design') }}</a></li>
                    <li><a href="#">{{ __('messages.Digital Marketing') }}</a></li>
                    <li><a href="#">{{ __('messages.E-commerce Solutions') }}</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3 class="footer-title">{{ __('messages.Quick Links') }}</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">{{ __('messages.Home') }}</a></li>
                    <li><a href="{{ route('services.index') }}">{{ __('messages.Services') }}</a></li>
                    <li><a href="{{ route('projects.index') }}">{{ __('messages.Projects') }}</a></li>
                    <li><a href="{{ route('blog.index') }}">{{ __('messages.Blog') }}</a></li>
                    <li><a href="{{ route('contact.index') }}">{{ __('messages.Contact') }}</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3 class="footer-title">{{ __('messages.Contact') }}</h3>
                <div class="footer-contact">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>123 Rue du Développement, Ville</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+123 456 7890</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>info@peopledev.com</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <span>{{ __('messages.Mon - Fri: 9AM - 6PM') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom" data-aos="fade-up">
            <div class="footer-bottom-content">
                <p>&copy; 2023 People Dev Organisation Software. {{ __('messages.All rights reserved') }}</p>
                <div class="footer-bottom-links">
                    <a href="#">{{ __('messages.Privacy Policy') }}</a>
                    <a href="#">{{ __('messages.Terms of Service') }}</a>
                    <a href="#">{{ __('messages.Legal Notice') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Back to Top Button -->
    <button class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>
