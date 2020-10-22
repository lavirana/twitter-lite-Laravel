
<ul>
    <li>
        <a class="font-bold text-lg mb-4 block" href="<?php echo e(route('home')); ?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
        </li>
    
    <li>
        <a class="font-bold text-lg mb-4 block" href="<?php echo e(route('explore')); ?>"><i class="fa fa-hashtag" aria-hidden="true"></i> &nbsp;Explore</a>
        </li>
    
      <li>
        <a class="font-bold text-lg mb-4 block" href="<?php echo e(route('explore')); ?>"><i class="fa fa-bell-o" aria-hidden="true"></i> &nbsp;Notification</a>
        </li>
     <li>
        <a class="font-bold text-lg mb-4 block" href="<?php echo e(route('messages')); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp;Messages</a>
        </li>
      <li> 
        <a class="font-bold text-lg mb-4 block" href="<?php echo e(route('profile',auth()->user())); ?>"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Profile</a>
        </li>
     <li>
        <form method="POST" action="/logout">
         <?php echo csrf_field(); ?>
            
            <button class="font-bold text-lg mb-4 block"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</button>
         </form>
        </li>
    
    </ul><?php /**PATH C:\xampp\htdocs\tweety\resources\views/_sidebar-links.blade.php ENDPATH**/ ?>