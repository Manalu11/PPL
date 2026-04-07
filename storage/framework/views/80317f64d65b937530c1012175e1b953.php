

<?php $__env->startSection('content'); ?>

<h4 class="mb-4">Tambah Produk</h4>

<form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="mb-3">
        <label>Brand</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="brand" class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" class="form-control">
    </div>

    <div class="mb-3">
        <label>Product Type</label>
        <input type="text" name="product_type" class="form-control">
    </div>

    <div class="mb-3">
        <label>Skin Type</label>
        <input type="text" name="skin_type" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-control">
            <option value="">-- Pilih --</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>">
                <?php echo e($category->name); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
        <label>
            <input type="checkbox" name="is_new">
            Produk Baru
        </label>
    </div>

    <div class="mb-3">
        <label>Gambar Produk</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-primary">Simpan</button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PPL\resources\views/admin/products/create.blade.php ENDPATH**/ ?>