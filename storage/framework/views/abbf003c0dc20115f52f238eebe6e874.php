

<?php $__env->startSection('content'); ?>

<h4 class="mb-4">Welcome Admin 👑</h4>

<div class="row">
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h3><?php echo e($totalProducts); ?></h3>
            <small>Produk</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h3><?php echo e($totalUsers); ?></h3>
            <small>Users</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h3><?php echo e($totalOrders); ?></h3>
            <small>Orders</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center bg-danger text-white">
            <h3>Rp <?php echo e(number_format($totalIncome, 0, ',', '.')); ?></h3>
            <small>Income</small>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PPL\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>