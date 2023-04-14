<div class="card pub_image">
    <div class="card-header">
        <?php if($image->user->image): ?>
        <div class="container-avatar">
            <img src="<?php echo e(route('user.avatar', ['filename'=>$image->user->image])); ?>" class="avatar" />
        </div>
        <?php endif; ?>

        <div class="data-user">
            <a href="<?php echo e(route('user.profile', ['id' => $image->user->id])); ?>">
                <?php echo e($image->user->name.' '. $image->user->surname); ?>

                <span class="nickname">
                    <?php echo e(' | @'.$image->user->nick); ?>

                </span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="image-container">
            <img src="<?php echo e(route('image.file', ['filename' => $image->image_path])); ?>" />
        </div>
        <div class="description">
            <span class="nickname"> <?php echo e('@'.$image->user->nick); ?> </span>
            <span class="nickname date"><?php echo e(' | '.\FormatTime::LongTimeFilter($image->created_at)); ?></span>
            <p><?php echo e($image->description); ?></p>
        </div>
        <div class="likes">
            <!-- Comprobar si el usuario le dio like a la imagen-->
            <?php $user_like = false; ?>
            <?php $__currentLoopData = $image->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($like->user->id == Auth::user()->id): ?>
            <?php $user_like = true; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(!$user_like): ?>
            <img src="<?php echo e(asset('img/hearts-black.png')); ?>" data-id="<?php echo e($image->id); ?>" class="btn-like" />
            <?php else: ?>
            <img src="<?php echo e(asset('img/hearts-red.png')); ?>" data-id="<?php echo e($image->id); ?>" class="btn-deslike" />
            <?php endif; ?>
            <span class="number_likes"><?php echo e(count($image->likes)); ?></span>
        </div>
        <div class="comments">
            <a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>" class="btn btn-warning btn-sm btn-comments">
                Comentarios (<?php echo e(count($image->comments)); ?>)
            </a>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\Curso-PHP\proyecto-laravel\resources\views/includes/image.blade.php ENDPATH**/ ?>