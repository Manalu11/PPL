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

    <div class="py-12 max-w-5xl mx-auto">

        <h2 class="text-2xl font-semibold mb-8">Keranjang Belanjaan</h2>

        <?php if(session('cart') && count(session('cart')) > 0): ?>

        <!-- LIST PRODUK -->
        <?php $total = 0; ?>

        <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php $total += $details['price'] * $details['quantity']; ?>

        <div class="bg-white p-6 rounded-xl shadow mb-4 flex justify-between items-center">

            <div class="flex items-center gap-4">

                <!-- GAMBAR -->
                <img src="<?php echo e(asset('storage/' . $details['image'])); ?>" class="w-24 h-24 object-cover rounded-lg">

                <div>
                    <h3 class="font-semibold text-lg">
                        <?php echo e($details['name']); ?>

                    </h3>

                    <p class="text-gray-500">
                        Rp <?php echo e(number_format($details['price'])); ?>

                    </p>

                    <!-- QTY CONTROL -->
                    <div class="flex items-center gap-3 mt-2">

                        <!-- Minus -->
                        <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="quantity" value="<?php echo e($details['quantity'] - 1); ?>">
                            <button class="bg-gray-200 px-3 py-1 rounded">-</button>
                        </form>

                        <span><?php echo e($details['quantity']); ?></span>

                        <!-- Plus -->
                        <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="quantity" value="<?php echo e($details['quantity'] + 1); ?>">
                            <button class="bg-gray-200 px-3 py-1 rounded">+</button>
                        </form>

                        <!-- Hapus -->
                        <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="text-red-500 text-sm ml-4">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>
            </div>

            <!-- TOTAL PER PRODUK -->
            <div class="font-semibold text-pink-500">
                Rp <?php echo e(number_format($details['price'] * $details['quantity'])); ?>

            </div>

        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <!-- TOTAL -->
        <div class="bg-white p-6 rounded-xl shadow mt-6 flex justify-between items-center">
            <h3 class="text-lg font-semibold">Total</h3>
            <span class="text-xl font-bold text-pink-500">
                Rp <?php echo e(number_format($total)); ?>

            </span>
        </div>

        <!-- CHECKOUT BUTTON -->
        <div class="mt-6 text-right">
            <a href="<?php echo e(route('checkout')); ?>"
                class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full inline-block">
                Checkout Sekarang
            </a>

        </div>

        <?php else: ?>

        <!-- EMPTY STATE -->
        <div class="flex flex-col items-center justify-center py-20">

            <div class="bg-pink-100 p-10 rounded-3xl mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-pink-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 6h14" />
                </svg>
            </div>

            <p class="text-gray-600 text-center mb-6 text-lg">
                Ayok Bestiee, isi keranjang kamu sekarang dengan <br>
                produk kecantikan favoritmu!
            </p>

            <a href="/" class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full transition">
                Belanja Sekarang
            </a>

        </div>

        <?php endif; ?>

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
<?php endif; ?><?php /**PATH C:\laragon\www\PPL\resources\views/cart/index.blade.php ENDPATH**/ ?>