<?php $__env->startSection('content'); ?>
  <div class="container">
    <p>ここはdrills.newページです</p>
    <div class="main">
      <!--フォーム-->
      <form action="post" action="">
        <!--問題1~10-->
        <?php for($i = 0; $i < 10; $i++): ?>
          <div class="form_content">
            <span class="problem_title"><?php echo e(__('問題').($i + 1)); ?></span><br>
            <input id="problem<?php echo e($i -1); ?>" type="text" class="form_content_input" autofocus>
            <?php $__errorArgs = ['problem'.($i - 1)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="err" role="alert">
                <strong><?php echo e($message); ?></strong>
              </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
        <?php endfor; ?>
        <!--登録ボタン-->
        <button type="submit" class="btn btn-primary">
            <?php echo e(__('登録する')); ?>

        </button>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/quiz_app/resources/views/problems/new.blade.php ENDPATH**/ ?>