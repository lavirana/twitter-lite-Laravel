



<?php $__env->startSection('content'); ?>

<div class="lg:flex lg:justify-center">
    <div class="lg:w-33">
    <?php echo $__env->make('_sidebar-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
    <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
 
    <?php // dd($user) ?>
<form method="POST" action="<?php echo e($user->path()); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
        Name
        </label>
        <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="" value="<?php echo e($user->name); ?>" required>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
         </div>
        
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
        UserName
        </label>
        <input class="border border-gray-400 p-2 w-full" type="text" name="username" value="<?php echo e($user->username); ?>" id="" required>
        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    
         <div class="mb-6">
                     <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avator">
        Avator
        </label>
    <div class="flex">
        <input class="border border-gray-400 p-2 w-full" type="file" name="avatar" value="" id="">
        <img src="<?php echo e($user->avatar); ?>" width=40px>
    </div>
             
             <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
             <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
             
             
             
        </div>
    
    
      <div class="mb-6">
                     <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="cover">
        Cover Image
        </label>
    <div class="flex">
        <input class="border border-gray-400 p-2 w-full" type="file" name="cover_image" value="" id="">
        <img src="http://127.0.0.1:8000/storage/<?php echo e($user->cover_image); ?>" width=40px>
    </div>
             
             <?php $__errorArgs = ['cover'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
             <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
             
             
             
        </div>
    
    
    
    
    
    
             <div class="mb-6">
                     <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avator">
        Bio
        </label>
    <div class="flex">
        <textarea class="border border-gray-400 p-2 w-full" name="bio" id=""><?php echo e($user->bio); ?>

       </textarea>
    </div>
             
             <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
             <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
             
             
             
        </div>
        
        <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
        Email
        </label>
        <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="" value="<?php echo e($user->email); ?>" required>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        
        
        <div class="mb-6">
           <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
        Password
        </label>
        <input class="border border-gray-400 p-2 w-full" type="password" name="password" value="" id="" required>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        
        
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">
        Password Confirmation
        </label>
        <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation" id="" required>
        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

       
    
            
        <div class="mb-6">
        
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    
        </form>
        
    </div>
    
    <div class="lg:w-1/6 ">
    <?php echo $__env->make('_friends-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tweety\resources\views/profilies/edit.blade.php ENDPATH**/ ?>