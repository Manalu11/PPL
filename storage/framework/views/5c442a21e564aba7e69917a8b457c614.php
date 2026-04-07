<header class="admin-header">

    <div class="header-left">
        <button class="menu-btn">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="header-center">
        <span class="page-title">
            <?php echo $__env->yieldContent('title', 'Dashboard'); ?>
        </span>
    </div>

    <div class="right-section">
        <i class="fas fa-home me-3"></i>

        <div class="auth-links">
            <span><?php echo e(Auth::user()->name ?? 'Admin'); ?></span>
        </div>
    </div>

</header><?php /**PATH C:\laragon\www\PPL\resources\views/components/admin-header.blade.php ENDPATH**/ ?>