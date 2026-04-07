<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-4xl mx-auto py-12">

        <h2 class="text-2xl font-bold mb-6">Halaman Checkout</h2>

        <form action="<?php echo e(route('checkout.process')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label class="block mb-2">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full border rounded px-4 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-2">Alamat</label>
                <textarea name="address" required class="w-full border rounded px-4 py-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-2">No HP</label>
                <input type="text" name="phone" required class="w-full border rounded px-4 py-2">
            </div>

            <button class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded">
                Proses Checkout
            </button>

        </form>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\PPL\resources\views/checkout/index.blade.php ENDPATH**/ ?>