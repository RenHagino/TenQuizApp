<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2><?php echo e(__('Drill List')); ?></h2>
        <div class="row">

            <?php $__currentLoopData = $drills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo e($drill->title); ?></h3>
                        <div class="row">
                          <a href="<?php echo e(route('drills.lesson', $drill->id)); ?>" class="btn btn-primary col-md-4 py-2 mx-2"><?php echo e(__('Go Practice')); ?></a>
                          <a href="<?php echo e(route('drills.edit', $drill->id)); ?>" class="btn btn-success col-md-3 py-2 mx-2"><?php echo e(__('Edit')); ?></a>
                          <form action="<?php echo e(route('drills.delete', $drill->id)); ?>" method="post" class="col-md-4">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-danger py-2" onclick='return confirm("削除しますか？");'><?php echo e(__('Delete')); ?></button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/quiz_app_laravel/resources/views/drills/index.blade.php ENDPATH**/ ?>