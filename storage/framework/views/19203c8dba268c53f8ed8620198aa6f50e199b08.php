<?php $__env->startSection('content'); ?>
  <form method="POST" action="<?php echo e(route('drills.create')); ?>" class="form form-problem">
  <?php echo csrf_field(); ?>
    <div class="card-body">

      <!--タイトルとジャンルー-->
      <div class="form-group row">
          <div class="col-md-12">
            <label for="" class="col-md-12 text-md-center"><?php echo e(__('Drill Title')); ?></label>
            <div class="col-md-6 mx-auto">
              <input id="title" type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" placeholder="" autocomplete="title" autofocus>
            </div>
          </div>
      </div>

      <!--カテゴリー-->
      <div class="form-group row">
        <div class="col-md-12">
          <label for="" class="col-md-12 text-md-center"><?php echo e(__('Drill Category')); ?></label>
          <div class="col-md-6 mx-auto">
            <input id="title" type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_name" placeholder="" autocomplete="category_name" autofocus>
          </div>
        </div>
      </div>


      <?php for($i = 1; $i <= 10; $i++): ?>  

        <!--解答方法コンポーネント-->
        <div class="form-group row mt-4">
            <!--問題Noラベル-->
            <label for="problem<?php echo e($i-1); ?>" class="col-md-12 col-form-label text-md-center"><?php echo e(__('Problem').$i); ?></label><br>

            <!--解答方法コンポーネント-->
            <div class="col-md-12">
              <div class="col-md-3 mx-auto mb-2">
                <select name="a_method<?php echo e($i-1); ?>" id="" class="form-control">
                  <option class="placeholder" value="" selected>解答方法を選択</OPTION>
                  <option class="" value="ひらがな" <?php if(old('a_method'.($i-1))=='ひらがな'): ?> selected <?php endif; ?>>ひらがな</option>
                  <option class="" value="漢字" <?php if(old('a_method'.($i-1))=='漢字'): ?> selected <?php endif; ?>>漢字</option>
                  <option class="" value="英数字" <?php if(old('a_method'.($i-1))=='英数字'): ?> selected <?php endif; ?>>英数字</option>
                </select>
              </div>
            </div>
        </div>

        <!--問題コンポーネント-->
        <div class="form-group row">
          <div class="col-md-6 mx-auto">
              <input id="problem<?php echo e($i - 1); ?>" type="text" class="form-control <?php $__errorArgs = ['problem'.($i - 1)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="problem<?php echo e($i - 1); ?>" value="<?php echo e(old('problem'.($i-1))); ?>" placeholder="問題内容を入力" autocomplete="problem<?php echo e($i - 1); ?>" autofocus>
              <?php $__errorArgs = ['problem'.($i - 1)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!--答えコンポーネント-->
        <div class="form-group row">
          <div class="col-md-6 mx-auto">
          <input id="answer<?php echo e($i-1); ?>" type="text" class="form-control <?php $__errorArgs = ['answer'.($i - 1)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="answer<?php echo e($i - 1); ?>" value="<?php echo e(old('answer'.($i-1))); ?>" placeholder="答えを入力" autocomplete="answer<?php echo e($i - 1); ?>" autofocus>
          <?php $__errorArgs = ['answer'.($i - 1)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
        </div>
      <?php endfor; ?>

      <!--登録ボタン-->
      <div class="form-group row">
        <button type="submit" class="col-md-2 mx-auto mt-4 btn btn-primary">
          <?php echo e(__('RegisterProblem')); ?>

        </button>
      </div>

    </div>
    
  </form>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/quiz_app_laravel/resources/views/drills/new.blade.php ENDPATH**/ ?>