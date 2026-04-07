<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboarhh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/gift.png')); ?>">


    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

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
            <img src="<?php echo e(asset('images/gift.png')); ?>" class="sidebar-logo">
            <span class="brand-text">GlowtoSkin</span>
        </div>

        <!-- Dashboard -->
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
            <i class="fas fa-bars me-2"></i>Dashboard
        </a>

        <!-- Produk -->
        <a href="<?php echo e(route('products.index')); ?>" class="<?php echo e(request()->routeIs('products.*') ? 'active' : ''); ?>">
            <i class="fas fa-box me-2"></i>Produk
        </a>

        <!-- Users -->
        <a href="<?php echo e(route('users.index')); ?>" class="<?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">
            <i class="fas fa-users me-2"></i>Users
        </a>

        <!-- Orders -->
        <a href="<?php echo e(route('orders.index')); ?>" class="<?php echo e(request()->routeIs('orders.*') ? 'active' : ''); ?>">
            <i class="fas fa-shopping-cart me-2"></i>Orders
        </a>

    </div>

    <?php if (isset($component)) { $__componentOriginal489711a049975b0fbcd3875ea3652a04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal489711a049975b0fbcd3875ea3652a04 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal489711a049975b0fbcd3875ea3652a04)): ?>
<?php $attributes = $__attributesOriginal489711a049975b0fbcd3875ea3652a04; ?>
<?php unset($__attributesOriginal489711a049975b0fbcd3875ea3652a04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal489711a049975b0fbcd3875ea3652a04)): ?>
<?php $component = $__componentOriginal489711a049975b0fbcd3875ea3652a04; ?>
<?php unset($__componentOriginal489711a049975b0fbcd3875ea3652a04); ?>
<?php endif; ?>
    <div class="content"><?php echo $__env->yieldContent('content'); ?> </div>
</body>

</html><?php /**PATH C:\laragon\www\PPL\resources\views/layouts/admin.blade.php ENDPATH**/ ?>