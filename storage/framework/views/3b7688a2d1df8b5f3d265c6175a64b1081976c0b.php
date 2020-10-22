



<?php $__env->startSection('content'); ?>

<div class="lg:flex lg:justify-center">
    <div class="lg:w-32">
    <?php echo $__env->make('_sidebar-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
    <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
        <div>
  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e($user->path()); ?>" class="flex items-center mb-5">
      
            <img src="<?php echo e($user->avatar); ?>" width="60" class="mr-4 rounded">
            
       
        <div>
        <h4 class="font-bold"><?php echo e('@'. $user->username); ?></h4>
            </div>
             </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($users->links()); ?>

    </div>
    </div>
    
    <div class="lg:w-1/6 ">
    <?php echo $__env->make('_friends-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tweety\resources\views/explore.blade.php ENDPATH**/ ?>