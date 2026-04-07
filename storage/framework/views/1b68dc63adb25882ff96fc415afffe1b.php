

<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('products.bulkDelete')); ?>" method="POST" id="bulkForm">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Produk</h4>
        <div>
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">
                Tambah Produk
            </a>

            <a href="<?php echo e(route('products.pdf')); ?>" class="btn btn-danger">
                Download PDF
            </a>

            <button type="submit" class="btn btn-dark"
                onclick="return confirm('Yakin ingin menghapus produk terpilih?')">
                Hapus Terpilih
            </button>
        </div>
    </div>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th width="30">
                    <input type="checkbox" id="selectAll">
                </th>
                <th>Gambar</th>
                <th>Brand</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="<?php echo e($product->id); ?>">
                </td>

                <td>
                    <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/'.$product->image)); ?>" width="60" class="rounded">
                    <?php endif; ?>
                </td>

                <td><?php echo e($product->brand); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->category->name ?? '-'); ?></td>
                <td>Rp <?php echo e(number_format($product->price,0,',','.')); ?></td>

                <td>
                    <a href="<?php echo e(route('products.edit',$product)); ?>" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="<?php echo e(route('products.destroy',$product)); ?>" method="POST" style="display:inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</form>

<script>
document.getElementById('selectAll').addEventListener('click', function() {
    let checkboxes = document.querySelectorAll('input[name="ids[]"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PPL\resources\views/admin/products/index.blade.php ENDPATH**/ ?>