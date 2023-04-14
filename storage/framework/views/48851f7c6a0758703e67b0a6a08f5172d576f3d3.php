

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card pub_image pub_image_detail">
                <div class="card-header">

                    <?php if($image->user->image): ?>
                    <div class="container-avatar">
                        <img src="<?php echo e(route('user.avatar', ['filename'=>$image->user->image])); ?>" class="avatar" />
                    </div>
                    <?php endif; ?>

                    <div class="data-user">
                        <?php echo e($image->user->name.' '. $image->user->surname); ?>

                        <span class="nickname">
                            <?php echo e(' | @'.$image->user->nick); ?>

                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container image-detail">
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

                    <?php if(Auth::user() && Auth::user()->id == $image->user->id): ?>
                    <div class="action">
                        <a href="<?php echo e(route('image.edit', ['id' => $image->id])); ?>" class="btn btn-sm btn-primary">Actualizar</a>

                        <!-- <a href="<?php echo e(route('image.delete', ['id' => $image->id])); ?>" class="btn btn-sm btn-danger">Borrar</a> -->
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                            Eliminar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">¿Estas seguro?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Si eliminas esta imagen nunca podrás recuperarla, ¿estas seguro de querer borrarla?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                        <a href="<?php echo e(route('image.delete', ['id' => $image->id])); ?>" class="btn btn-danger">Borrar definitivamente</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="clearfix"></div>
                    <div class="comments">
                        <h4>Comentarios (<?php echo e(count($image->comments)); ?>)</h4>
                        <hr>

                        <form method="POST" action="<?php echo e(route('comment.save')); ?>">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="image_id" value="<?php echo e($image->id); ?>">
                            <p>
                                <textarea class="form-control <?php echo e($errors->has('content') ? 'is-invalid' : ' '); ?>" name="content"></textarea>
                                <?php if($errors->has('content')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('content')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </p>
                            <button type="submit" class="btn btn-success">
                                Comentar
                            </button>
                        </form>

                        <hr>

                        <?php $__currentLoopData = $image->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="comments_descr">
                            <span class="nickname"> <?php echo e('@'.$comment->user->nick); ?> </span>
                            <span class="nickname date"><?php echo e(' | '.\FormatTime::LongTimeFilter($comment->created_at)); ?></span>
                            <p><?php echo e($comment->content); ?><br>
                                <?php if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id)): ?>
                                <a href="<?php echo e(route('comment.delete', ['id' => $comment->id])); ?>" class="btn btn-sm btn-danger">
                                    Eliminar
                                </a>
                                <?php endif; ?>
                            </p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Curso-PHP\proyecto-laravel\resources\views/image/detail.blade.php ENDPATH**/ ?>