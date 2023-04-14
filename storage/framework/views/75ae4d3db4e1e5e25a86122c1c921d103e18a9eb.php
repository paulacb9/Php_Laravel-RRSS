<?php if(Auth::user()->image): ?>
    <img src="<?php echo e(route('user.avatar', ['filename'=>Auth::user()->image])); ?>" class="avatar" />
<?php endif; ?><?php /**PATH C:\wamp64\www\Curso-PHP\proyecto-laravel\resources\views/includes/avatar.blade.php ENDPATH**/ ?>