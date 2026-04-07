

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Data Pesanan</h4>
</div>

<table class="table table-bordered bg-white">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Barang Dipesan</th>
            <th>Total</th>
            <th>Status</th>
            <th>Update Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>#<?php echo e($order->id); ?></td>

            <td><?php echo e($order->name); ?></td>

            
            <td>
                <?php if($order->items->count()): ?>
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <?php echo e($item->product_name); ?> (<?php echo e($item->quantity); ?>x)
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <span class="text-muted">Tidak ada item</span>
                <?php endif; ?>
            </td>

            <td>Rp <?php echo e(number_format($order->total,0,',','.')); ?></td>

            <td>
                <?php if($order->status == 'pending'): ?>
                <span class="badge bg-warning text-dark">Pending</span>
                <?php elseif($order->status == 'paid'): ?>
                <span class="badge bg-success">Sudah Bayar</span>
                <?php elseif($order->status == 'shipped'): ?>
                <span class="badge bg-info">Dikirim</span>
                <?php elseif($order->status == 'rejected'): ?>
                <span class="badge bg-danger">Ditolak</span>
                <?php else: ?>
                <span class="badge bg-secondary"><?php echo e(ucfirst($order->status)); ?></span>
                <?php endif; ?>
            </td>

            
            <td>
                <form action="<?php echo e(route('orders.updateStatus',$order)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <select name="status" class="form-select form-select-sm mb-1">
                        <option value="pending">Pending</option>
                        <option value="paid">Sudah Bayar</option>
                        <option value="shipped">Dikirim</option>
                        <option value="rejected">Tolak</option>
                    </select>

                    <button class="btn btn-primary btn-sm w-100">
                        Update
                    </button>
                </form>
            </td>

            
            <td>
                <a href="<?php echo e(route('orders.show',$order)); ?>" class="btn btn-info btn-sm">
                    Detail
                </a>

                <form action="<?php echo e(route('orders.destroy',$order)); ?>" method="POST" style="display:inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
            </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PPL\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>