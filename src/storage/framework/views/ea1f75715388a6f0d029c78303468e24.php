<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo e(__('Social Login')); ?></h4>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.general.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="type" value="<?php echo e(\App\Enums\GeneralSetting::SOCIAL_LOGIN->value); ?>">
            <?php $__currentLoopData = $setting->social_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h5 class="fs-14 mb-2"> <?php echo e(__(replaceInputTitle($key))); ?> </h5>

                <div class="form-wrapper">
                    <div class="row g-3">
                        <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_key =>  $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($social_key == 'status'): ?>
                                <div class="col-lg-6 mb-3">
                                    <label for="social-login-<?php echo e($key); ?>-<?php echo e($social_key); ?>" class="form-label"><?php echo e(__($social_key)); ?> <sup class="text-danger">*</sup>
                                    </label>

                                    <select class="form-select" id="social-login-<?php echo e($key); ?>-<?php echo e($social_key); ?>" name="social_login[<?php echo e($key); ?>][<?php echo e($social_key); ?>]" required>
                                        <?php $__currentLoopData = \App\Enums\Status::toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_key =>  $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($status); ?>" <?php if($status == $value): ?> selected <?php endif; ?>><?php echo e(replaceInputTitle($status_key)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-6 mb-3">
                                    <label for="<?php echo e($key); ?>-<?php echo e($social_key); ?>" class="form-label"><?php echo e(__(replaceInputTitle($social_key))); ?> <sup class="text-danger">*</sup></label>
                                    <input type="text" name="social_login[<?php echo e($key); ?>][<?php echo e($social_key); ?>]"  value="<?php echo e($value); ?>" class="form-control" id="<?php echo e($key); ?>-<?php echo e($social_key); ?>" required>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button class="i-btn btn--primary btn--lg"> <?php echo e(__('admin.button.save')); ?></button>
        </form>
    </div>
</div>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/general/social-login.blade.php ENDPATH**/ ?>