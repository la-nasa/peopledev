<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
    <title>@yield('title', __('messages.Welcome to People Dev'))</title>
    <meta name="title" content="@yield('meta_title', __('messages.Welcome to People Dev'))">
    <meta name="description" content="@yield('meta_description', __('messages.Custom solutions to boost your business'))">
    <meta name="keywords" content="@yield('meta_keywords', 'développement web, applications mobiles, design UI/UX, marketing digital, infographie, réseaux sociaux, e-commerce')">
    <meta name="author" content="People Dev Organisation Software">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('meta_title', __('messages.Welcome to People Dev'))">
    <meta property="og:description" content="@yield('meta_description', __('messages.Custom solutions to boost your business'))">
    <meta property="og:image" content="@yield('meta_image', asset('images/og-image.jpg'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('meta_title', __('messages.Welcome to People Dev'))">
    <meta property="twitter:description" content="@yield('meta_description', __('messages.Custom solutions to boost your business'))">
    <meta property="twitter:image" content="@yield('meta_image', asset('images/og-image.jpg'))">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Glide.js Carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.theme.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Schema.org structured data -->
    @yield('structured-data')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Loading Screen -->
    <div id="loading" class="loading-screen">
        <div class="loading-spinner">
            <div class="spinner"></div>
            <p>People Dev</p>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="scroll-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Header -->
    @include('partials.header')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/glide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

    <script>
        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            // AOS initialization
            AOS.init({
                duration: 1000,
                once: true,
                offset: 100
            });

            // Hide loading screen
            setTimeout(() => {
                document.getElementById('loading').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('loading').style.display = 'none';
                }, 500);
            }, 1500);

            // Scroll to top button
            const scrollToTopBtn = document.getElementById('scrollToTop');
            
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    scrollToTopBtn.classList.add('show');
                } else {
                    scrollToTopBtn.classList.remove('show');
                }
            });

            scrollToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Initialize Glide.js for testimonials
            if (document.querySelector('.glide')) {
                new Glide('.glide', {
                    type: 'carousel',
                    perView: 1,
                    autoplay: 4000,
                    animationDuration: 800,
                    breakpoints: {
                        768: {
                            perView: 1
                        }
                    }
                }).mount();
            }

            // Mobile menu toggle
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('active');
                });
            }

            // Close mobile menu when clicking on links
            const mobileLinks = document.querySelectorAll('.mobile-nav-link');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.remove('active');
                });
            });
        });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Mettre à jour le bouton de langue avec la langue actuelle
    const updateLanguageButton = () => {
        const currentLangBtn = document.getElementById('current-lang-btn');
        if (currentLangBtn) {
            // Récupérer la langue depuis l'élément meta ou les données
            const htmlLang = document.documentElement.getAttribute('lang');
            const currentLang = htmlLang ? htmlLang.substring(0, 2) : 'fr';
            currentLangBtn.innerHTML = currentLang.toUpperCase() + ' <i class="fas fa-chevron-down"></i>';
        }
    };

    // Mettre à jour au chargement
    updateLanguageButton();

    // Écouter les changements de langue via AJAX (si applicable)
    document.addEventListener('languageChanged', function() {
        updateLanguageButton();
    });

    // Gérer le clic sur les liens de langue
    const langLinks = document.querySelectorAll('.lang-dropdown a');
    langLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const lang = this.getAttribute('href').split('/').pop();
            
            // Changement immédiat de l'affichage
            document.getElementById('current-lang-btn').innerHTML = lang.toUpperCase() + ' <i class="fas fa-chevron-down"></i>';
            
            // Ajouter la classe active
            langLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            
            // Redirection après un court délai pour l'effet UX
            setTimeout(() => {
                window.location.href = this.href;
            }, 300);
        });
    });
});
</script>
</body>
</html>