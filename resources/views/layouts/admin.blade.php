<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboarhh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/gift.png') }}">


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>

    <style>
        /* ================= HEADER ================= */
        .admin-header {
            height: 70px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            margin-left: 240px;
            width: calc(100% - 240px);
            border-bottom: 1px solid #f1f1f1;
        }

        .page-title {
            font-size: 18px;
            font-weight: 600;
        }

        .menu-btn {
            border: none;
            background: #f8f9fa;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            font-size: 18px;
            transition: 0.2s;
        }

        .menu-btn:hover {
            background: #fce4ec;
        }

        .right-section {
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 500;
        }

        /* ================= BODY ================= */
        body {
            background-color: #f8f9fa;
            margin: 0;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: linear-gradient(180deg, #f8c8d8, #ffffff);
            padding-top: 25px;
            position: fixed;
        }

        /* Brand (logo + text sejajar) */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 20px 20px 20px;
        }

        .sidebar-logo {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 6px 15px rgba(214, 51, 132, 0.2);
        }

        .brand-text {
            font-size: 20px;
            font-weight: 700;
            color: #d63384;
        }

        /* Menu */
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #8b3a62;
            text-decoration: none;
            border-radius: 12px;
            margin: 5px 15px;
            font-weight: 500;
            transition: 0.2s;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #ffffff;
            color: #d63384;
        }

        /* ================= CONTENT ================= */
        .content {
            margin-left: 240px;
            padding: 30px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="sidebar">

        <div class="sidebar-brand">
            <img src="{{ asset('images/gift.png') }}" class="sidebar-logo">
            <span class="brand-text">GlowtoSkin</span>
        </div>

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-bars me-2"></i>Dashboard
        </a>

        <!-- Produk -->
        <a href="{{ route('admin.products.index') }}"
            class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fas fa-box me-2"></i>Produk
        </a>

        <!-- Users -->
        <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="fas fa-users me-2"></i>Users
        </a>

        <!-- Orders -->
        <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
            <i class="fas fa-shopping-cart me-2"></i>Orders
        </a>
        <!-- Promo-->
        <a href="{{ route('admin.promotions.index') }}"
            class="{{ request()->routeIs('admin.promotions.*') ? 'active' : '' }}">
            <i class="fas fa-tag me-2"></i>Promotions
        </a>

    </div>

    <x-admin-header />
    <div class="content">@yield('content') </div>
</body>

</html>