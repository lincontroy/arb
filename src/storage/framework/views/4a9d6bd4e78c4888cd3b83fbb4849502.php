<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo e(__('Recaptcha Settings')); ?></h4>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.general.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="type" value="<?php echo e(\App\Enums\GeneralSetting::RECAPTCHA_SETTING->value); ?>">
                <div class="form-wrapper">
                    <div class="row g-3">
                        <?php $__currentLoopData = $setting->recaptcha_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 'registration' || $key == 'login'): ?>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="<?php echo e($key); ?>"><?php echo e(__('Captcha With')); ?> <?php echo e(__(replaceInputTitle($key))); ?> </label>
                                    <select class="form-select" id="<?php echo e($key); ?>" name="recaptcha_setting[<?php echo e($key); ?>]" required>
                                        <?php $__currentLoopData = \App\Enums\Status::toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_key =>  $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($status); ?>" <?php if($status == $value): ?> selected <?php endif; ?>><?php echo e(replaceInputTitle($status_key)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div> 
                            <?php else: ?>
                                <div class="col-lg-6 mb-3">
                                    <label for="<?php echo e($key); ?>" class="form-label"><?php echo e(__(replaceInputTitle($key))); ?> <sup class="text-danger">*</sup></label>
                                    <input type="text" name="recaptcha_setting[<?php echo e($key); ?>]"  value="<?php echo e($value); ?>" class="form-control" id="<?php echo e($key); ?>" required>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <button class="i-btn btn--primary btn--lg"> <?php echo e(__('admin.button.save')); ?></button>
        </form>
    </div>
</div>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/general/recaptcha.blade.php ENDPATH**/ ?>