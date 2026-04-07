<h2>Laporan Produk</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Brand</th>
        <th>Kategori</th>
        <th>Harga</th>
    </tr>

    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
            <?php
            $path = public_path('storage/'.$product->image);
            ?>

            <?php if(file_exists($path)): ?>
            <img src="data:image/<?php echo e(pathinfo($path, PATHINFO_EXTENSION)); ?>;base64,<?php echo e(base64_encode(file_get_contents($path))); ?>"
                width="80">
            <?php endif; ?>
        </td>
        </td>
        < <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->brand); ?></td>
            <td><?php echo e($product->category->name ?? '-'); ?></td>
            <td>Rp <?php echo e(number_format($product->price,0,',','.')); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH C:\laragon\www\PPL\resources\views/admin/products/pdf.blade.php ENDPATH**/ ?>