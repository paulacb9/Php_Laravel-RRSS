

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Gente</h1>
            <form method="GET" action="<?php echo e(route('user.index')); ?>" id='buscador'>
                <div class="row">
                    <div class="form-group col">
                        <input type="text" id="search" class="form-control" />
                    </div>
                    <div class="form-group col btn-search">
                        <input type="submit" value="buscar" class="btn btn-success" />
                    </div>
                </div>
            </form>
            <hr>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="profile-user">

                    <?php if($user->image): ?>
                    <div class="container-avatar">
                        <img src="<?php echo e(route('user.avatar', ['filename'=>$user->image])); ?>" class="avatar" />
                    </div>
                    <?php endif; ?>

                    <div class="user-info">
                        <h2><?php echo e('@'.$user->nick); ?></h2>
                        <h3><?php echo e($user->name.' '.$user->surname); ?></h3>
                        <p><?php echo e('Se unió: '.\FormatTime::LongTimeFilter($user->created_at)); ?></p>
                        <a href="<?php echo e(route('user.profile', ['id' => $user->id])); ?>" class="btn btn-success">Ver perfil</a>
                    </div>

                    <div class="clearfix"></div>
                    <hr>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- Paginacion -->
            <div class="clearfix"></div>
            <?php echo e($users->links()); ?>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Curso-PHP\proyecto-laravel\resources\views/user/index.blade.php ENDPATH**/ ?>