<aside class="admin-sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <i class="fas fa-code"></i>
            <span>PeopleDev</span>
        </div>
        <button class="sidebar-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.services') }}" class="nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span>Services</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.projects') }}" class="nav-link {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i>
                    <span>Projets</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.blog') }}" class="nav-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.testimonials') }}" class="nav-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                    <i class="fas fa-comments"></i>
                    <span>Témoignages</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.team') }}" class="nav-link {{ request()->routeIs('admin.team*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Équipe</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.statistics') }}" class="nav-link {{ request()->routeIs('admin.statistics*') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar"></i>
                    <span>Statistiques</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.contact') }}" class="nav-link {{ request()->routeIs('admin.contact*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>Messages</span>
                    @if($unreadCount > 0)
                    <span class="badge badge-danger">{{ $unreadCount }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                </form>
            </li>
        </ul>
    </nav>
</aside>