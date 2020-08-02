<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row col-md-12 my-4">
            <h2 class="col-md-4 text-center mx-auto"><?php echo e(__('Drill List')); ?></h2>
        </div>

        <div class="row col-md-12">
            <?php $__currentLoopData = $drills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 mx-auto mt-4">
                <div class="card col-md-12">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo e($drill->title); ?></h3>
                        <div class="row col-md-12">
                            <a href="<?php echo e(route('drills.lesson', $drill->id)); ?>" class="btn btn-primary col-md-5 py-2 mx-1"><?php echo e(__('Go Practice')); ?></a>
                            <a href="<?php echo e(route('drills.answer', $drill->id)); ?>" class="btn btn-warning col-md-5 py-2 mx-1"><?php echo e(__('See Answer')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/quiz_app_laravel/resources/views/drills/index.blade.php ENDPATH**/ ?>