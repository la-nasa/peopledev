<header class="admin-header">
    <div class="header-left">
        <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
    </div>
    
    <div class="header-right">
        <div class="user-menu">
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <span class="user-role">Administrateur</span>
            </div>
            <div class="user-avatar">
                <i class="fas fa-user"></i>
            </div>
        </div>
    </div>
</header>