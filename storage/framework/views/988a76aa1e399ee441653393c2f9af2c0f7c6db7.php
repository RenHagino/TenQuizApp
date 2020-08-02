<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Drill Updater')); ?></div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('drills.update', $drill->id )); ?>">
                            <?php echo csrf_field(); ?>

                            <!-- タイトル-->
                            <div class="row form-group col-md-8 mx-auto mt-2">
                                
                                <label for="title" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Title')); ?></label>
                                
                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" value="<?php echo e($drill->title); ?>" autocomplete="title" autofocus>
                                    <?php $__errorArgs = ['title'];
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

                            <!--解答方法-->
                            <div class="row form-group col-md-8 mx-auto mt-2">
                                <label for="category_name" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Drill Category')); ?></label>

                                <div class="col-md-8">
                                    <input id="category_name" type="text" class="form-control <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_name" value="<?php echo e($drill->category_name); ?>" autocomplete="category_name" autofocus>

                                    <?php $__errorArgs = ['category_name'];
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

                            <?php for($i = 1; $i <= 10; $i++): ?>

                                <!--解答方法コンポーネント-->
                                <div class="row">
                                    <!--問題Noラベル-->
                                    <label for="problem<?php echo e($i-1); ?>" class="col-md-12 col-form-label  text-md-center "><?php echo e(__('Problem').$i); ?></label>
                                </div>

                                <!--解答方法コンポーネント-->
                                <div class="row form-group col-md-8 mt-0 mx-auto">
                                    <label for="title" class="col-md-2 col-form-label text-md-right"><?php echo e(__('AnswerMethod')); ?></label>
                                    <div class="col-md-8">
                                        <select name="a_method<?php echo e($i-1); ?>" id="" class="form-control">
                                            <option class="placeholder" value="" selected>解答方法を選択</OPTION>
                                            <option class="" value="ひらがな" <?php if($drill[ 'a_method'.($i-1)]=='ひらがな'): ?> selected <?php endif; ?>>ひらがな</option>
                                            <option class="" value="漢字" <?php if($drill[ 'a_method'.($i-1)]=='漢字'): ?> selected <?php endif; ?>>漢字</option>
                                            <option class="" value="英数字" <?php if($drill['a_method'.($i-1)]=='英数字'): ?> selected <?php endif; ?>>英数字</option>
                                        </select>
                                    </div>
                                </div>
         

                                <!--問題コンポーネント-->
                                <div class="row form-group col-md-10 mx-auto mt-2">
                                    <!--valueに problem + 問題番号 0~9 を指定してDBの値が元から入力された状態にする-->
                                    <p class="col-md-1 text-right mx-2 mt-2 h5">問題</p>
                                    <input id="problem<?php echo e($i - 1); ?>" type="text" class="form-control col-md-10 <?php $__errorArgs = ['problem'.($i - 1)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="problem<?php echo e($i - 1); ?>" value="<?php echo e($drill[ 'problem'.($i-1) ]); ?>" placeholder="内容を入力" autocomplete="problem<?php echo e($i - 1); ?>" autofocus>
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


                                <!--答えコンポーネント-->
                                <div class="row form-group col-md-10 mx-auto mt-2">
                                    <!--valueに answer + 問題番号0~9 を指定してDBの値が元から入力された状態にする-->
                                    <p class="col-md-1 text-right mx-2 mt-2 h5">答え</p>
                                    <input id="answer<?php echo e($i-1); ?>" type="text" class="col-md-10 form-control <?php $__errorArgs = ['answer'.($i - 1)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="answer<?php echo e($i - 1); ?>" value="<?php echo e($drill[ 'answer'.($i-1) ]); ?>" placeholder="答えを入力" autocomplete="answer<?php echo e($i - 1); ?>" autofocus>
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
                                
                            <?php endfor; ?>

                            <!--更新ボタン-->
                            <div class="row form-group py-3">
                                <button type="submit" class="btn btn-primary mx-auto">
                                    <?php echo e(__('Update Drill')); ?>

                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/quiz_app_laravel/resources/views/drills/edit.blade.php ENDPATH**/ ?>