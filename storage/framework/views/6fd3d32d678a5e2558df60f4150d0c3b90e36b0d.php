       
        
        <div class="border border-gray-300 rounded-lg">
<?php $__empty_1 = true; $__currentLoopData = $tweets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>  
      <?php echo $__env->make('_tweet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="p-4">No Tweet yet</p>
<?php endif; ?>
            
        </div><?php /**PATH C:\xampp\htdocs\tweety\resources\views/_timeline.blade.php ENDPATH**/ ?>