

<?php $__env->startSection('content'); ?>

<div class="lg:flex lg:justify-center">
    
    <?php if(auth()->check()): ?>
    <div class="lg:w-33">
    <?php echo $__env->make('_sidebar-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php endif; ?>

    
    <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
            <form method="post" action="/tweets">
                <?php echo csrf_field(); ?>
                <textarea name="body" id="" class="w-full" placeholder="what's up doc?" required></textarea>
                <hr class="my-4" required>
                <footer class="flex justify-between items-center">
                    <i style="color: #8ed0f9;" class="fa fa-picture-o" aria-hidden="true"></i>
                       <button type="submit"  class="hover:bg-blue-600 bg-blue-500 rounded-full shadow py-2 px-10 text-white text-sm h-10">Publish</button>
                </footer>
                </form>
        <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-sm mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
 <?php echo $__env->make('_timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
    </div>
     <?php if(auth()->check()): ?>
    <div class="lg:w-1/6">
    <?php echo $__env->make('_friends-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tweety\resources\views/home.blade.php ENDPATH**/ ?>