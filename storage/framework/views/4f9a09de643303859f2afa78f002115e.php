<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="min-h-screen flex items-center justify-center bg-[#f3f3f3] py-10">
        <div class="bg-white w-[460px] px-12 py-12 rounded-[24px]
                    shadow-[0_15px_35px_rgba(0,0,0,0.08)] text-center">

            <!-- Logo -->
            <div class="mb-8">
                <img src="/images/gift.png" class="w-24 h-24 object-cover rounded-full mx-auto mb-6 
            border-4 border-pink-400 shadow-md">

                SELAMAT DATANG
                <span class="text-pink-500">TO GLOWTOSKIN</span>
                </h2>

                <p class="text-sm text-gray-500 mt-4 leading-relaxed">
                    Temukan berbagai produk kecantikan terbaik untuk mempercantik harimu.
                    <br>
                    Silakan login atau daftar untuk mulai belanja.
                </p>
            </div>

            <!-- Form -->
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="mb-5 text-left">
                    <label class="text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required autofocus class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl 
                               focus:ring-2 focus:ring-pink-400 focus:border-pink-400 outline-none">
                </div>

                <div class="mb-6 text-left">
                    <label class="text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" required class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl 
                               focus:ring-2 focus:ring-pink-400 focus:border-pink-400 outline-none">
                </div>
                <button type="submit" class="w-full bg-pink-500 text-white py-3 rounded-xl 
           font-semibold hover:bg-pink-600 transition duration-200">
                    Masuk
                </button>


            </form>

            <p class="mt-6 text-sm text-gray-600">
                Belum punya akun?
                <a href="<?php echo e(route('register')); ?>" class="text-pink-500 font-semibold hover:underline">
                    Daftar
                </a>
            </p>

            <p class="text-xs text-gray-400 mt-8 tracking-wider">
                © <?php echo e(date('Y')); ?> GLOWTOSKIN
            </p>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\PPL\resources\views/auth/login.blade.php ENDPATH**/ ?>