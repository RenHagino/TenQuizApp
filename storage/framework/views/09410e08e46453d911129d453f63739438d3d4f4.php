<?php $__env->startSection('content'); ?>
  <lesson-component 
                      title="<?php echo e(__('Practice').'「'.$drill->title.'」'); ?>"
                      :drill="<?php echo e($drill); ?>"
                      category_name="<?php echo e($drill->category_name); ?>"
                      >

  </lesson-component>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/quiz_app_laravel/resources/views/drills/lesson.blade.php ENDPATH**/ ?>