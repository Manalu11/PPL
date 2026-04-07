<header class="admin-header">

    <div class="header-left">
        <button class="menu-btn">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="header-center">
        <span class="page-title">
            @yield('title', 'Dashboard')
        </span>
    </div>

    <div class="right-section">
        <i class="fas fa-home me-3"></i>

        <div class="auth-links">
            <span>{{ Auth::user()->name ?? 'Admin' }}</span>
        </div>
    </div>

</header>