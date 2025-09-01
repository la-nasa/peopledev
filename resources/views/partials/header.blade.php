<header class="header">
    <div class="container header-content">
        <div class="logo">
            <a href="{{ route('home') }}" class="logo-text" data-aos="fade-down">
                <span class="logo-icon">
                    <i class="fas fa-code"></i>
                </span>
                People<span class="logo-highlight">Dev</span>
            </a>
        </div>
        
        <nav class="nav" data-aos="fade-down">
            <ul>
                <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">{{ __('messages.Home') }}</a></li>
                <li><a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">{{ __('messages.Services') }}</a></li>
                <li><a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">{{ __('messages.Projects') }}</a></li>
                <li><a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">{{ __('messages.Blog') }}</a></li>
                <li><a href="{{ route('team.index') }}" class="nav-link {{ request()->routeIs('team.index') ? 'active' : '' }}">{{ __('messages.Team') }}</a></li>
                <li><a href="{{ route('contact.index') }}" class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">{{ __('messages.Contact') }}</a></li>
                @auth
                    <li><a href="{{ route('admin.dashboard') }}" class="nav-link admin-link">{{ __('messages.Admin') }}</a></li>
                @endauth
            </ul>
        </nav>
        
        <div class="header-actions" data-aos="fade-down">
            <div class="language-switcher">
                <button class="lang-btn" id="current-lang-btn">
                    {{ strtoupper(app()->getLocale()) }}
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="lang-dropdown">
                    <a href="{{ route('lang.switch', 'fr') }}" class="{{ app()->getLocale() === 'fr' ? 'active' : '' }}">
                        FR
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">
                        EN
                    </a>
                </div>
            </div>
            
            {{-- <button class="mobile-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </button> --}}
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <div class="mobile-menu-content">
            <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">{{ __('messages.Home') }}</a>
            <a href="{{ route('services.index') }}" class="mobile-nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">{{ __('messages.Services') }}</a>
            <a href="{{ route('projects.index') }}" class="mobile-nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">{{ __('messages.Projects') }}</a>
            <a href="{{ route('blog.index') }}" class="mobile-nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">{{ __('messages.Blog') }}</a>
            <a href="{{ route('team.index') }}" class="mobile-nav-link {{ request()->routeIs('team.index') ? 'active' : '' }}">{{ __('messages.Team') }}</a>
            <a href="{{ route('contact.index') }}" class="mobile-nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">{{ __('messages.Contact') }}</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link admin-link">{{ __('messages.Admin') }}</a>
            @endauth
        </div>
    </div>
</header>