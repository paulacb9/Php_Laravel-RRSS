

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar mi imagen</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('image.update')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="image_id" value="<?php echo e($image->id); ?>" />

                        <div class="from-group row row mb-3">
                            <label for="image_path" class="col-md-3 col-form-label text-md-end">Imagen</label>
                            <div class="col-md-6">
                            <?php if($image->user->image): ?>
                                <div class="container-avatar">
                                <img src="<?php echo e(route('image.file', ['filename' => $image->image_path])); ?>" class="avatar" />
                                </div>
                            <?php endif; ?>
                                <input id="image_path" type="file" name="image_path" class="form-control <?php echo e($errors->has('image_path') ? 'is-invalid' : ' '); ?>" />

                                <?php if($errors->has('image_path')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('image_path')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="from-group row row mb-3">
                            <label for="description" class="col-md-3 col-form-label text-md-end">Descripción</label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ' '); ?>" required><?php echo e($image->description); ?></textarea>

                                <?php if($errors->has('description')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="from-group row row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Actualizar imagen" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Curso-PHP\proyecto-laravel\resources\views/image/edit.blade.php ENDPATH**/ ?>