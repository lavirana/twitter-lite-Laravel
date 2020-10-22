<?php $att = $user->getAttributes();


?>



<?php $__env->startSection('content'); ?>

<div class="lg:flex lg:justify-center">
    <div class="lg:w-33">
    <?php echo $__env->make('_sidebar-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
    <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
        <header class="mb-6 relative">
            <div class="relative">
                            
    <?php if($user->cover_image == "http://127.0.0.1:8000/storage/"){ ?>
    
    <img style="width: 700px;height: 223px;border-radius: 20px;" src=http://127.0.0.1:8000/storage/covers/333.jpg class="rounded-full mr-2">
<?php } else {  ?>
    <img style="width: 700px;height: 223px;border-radius: 20px;" src="http://127.0.0.1:8000/storage/<?php echo $att['cover_image']; ?>" class="md-2">
                 <?php } ?> 
                    <img src="<?php echo e($user->avatar); ?>" alt="" class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" style="left: 50%;border: 4px solid #fff;"  width="150">
            </div>
            <div class="flex justify-between items-center mb-6">
                <div style="max-width: 270px;">
                    <h2 class="font-bold text-2xl mb-0"><?php echo e(ucfirst($user->name)); ?></h2>
                    <p class="text-sm">Joined <?php echo e($user->created_at->diffForHumans()); ?></p>
                    </div>
                
                
                
                <div class="flex">
                    <?php if(auth()->user()->is($user)): ?>
                    <a href="<?php echo e($user->path('edit')); ?>" class="rounded-full border border-gray-300 py-2 px-2 text-black text-xs mr-2" style="    color: #1da1f2;
    border: 1px solid #1da1f2;
    /* font-size: 12px; */
    font-weight: 700;">Edit Profile</a>
                    <?php endif; ?>
                    <?php if(auth()->user()->isNot($user)): ?>
                    <form method="POST" action="/profiles/<?php echo e($user->username); ?>/follow">
                        <?php echo csrf_field(); ?>
                    <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
                      <?php echo e(auth()->user()->following($user) ?  'Unfollow Me' : 'Follow Me'); ?>

                    </button>
                    </form>
                    <?php endif; ?>
                    
                    </div>
                </div>
                        
            <p class="text-sm">
              <?php echo e($user->bio); ?>

                </p>


    </header>
        
    
        
        <?php echo $__env->make('_timeline',[
        'tweets' => $user->tweets
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
    </div>
    
    <div class="lg:w-1/6 ">
    <?php echo $__env->make('_friends-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tweety\resources\views/profilies/show.blade.php ENDPATH**/ ?>