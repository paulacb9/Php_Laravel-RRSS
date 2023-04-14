

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="profile-user">
            
                <?php if($user->image): ?>
                    <div class="container-avatar">
                        <img src="<?php echo e(route('user.avatar', ['filename'=>$user->image])); ?>" class="avatar" />
                    </div>
                <?php endif; ?>
                
                <div class="user-info">
                    <h1><?php echo e('@'.$user->nick); ?></h1>
                    <h2><?php echo e($user->name.' '.$user->surname); ?></h2>
                    <p><?php echo e('Se unió: '.\FormatTime::LongTimeFilter($user->created_at)); ?></p>
                </div>

                <div class="clearfix"></div>
                <hr>
            </div>
            

            <div class="clearfix"></div>

            <?php $__currentLoopData = $user->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('includes.image', ['image' => $image], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Curso-PHP\proyecto-laravel\resources\views/user/profile.blade.php ENDPATH**/ ?>