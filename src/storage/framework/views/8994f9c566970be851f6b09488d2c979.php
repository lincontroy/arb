<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo e(__($setTitle)); ?></h4>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.general.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="type" value="<?php echo e(\App\Enums\GeneralSetting::APPEARANCE->value); ?>">
                <div class="row g-3">
                    <?php $__currentLoopData = $setting->appearance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key == 'timezone'): ?>
                            <div class="col-lg-6 mb-3">
                                <label for="timezone" class="form-label"><?php echo e(__('App Timezone')); ?>  <sup class="text-danger">*</sup></label>
                                <select class="form-select" id="timezone" name="appearance[timezone]" required>
                                    <?php $__currentLoopData = $timeLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeLocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$timeLocation); ?>" <?php if($value == $timeLocation): ?> selected <?php endif; ?>><?php echo e($timeLocation); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-6 mb-3">
                                <label for="<?php echo e($key); ?>" class="form-label"><?php echo e(__(replaceInputTitle($key))); ?> <sup class="text-danger">*</sup></label>
                                <input type="text" name="appearance[<?php echo e($key); ?>]"  value="<?php echo e($value); ?>" class="form-control" id="<?php echo e($key); ?>" required>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <button class="i-btn btn--primary btn--lg"> <?php echo e(__('admin.button.save')); ?></button>
        </form>
    </div>
</div>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/general/basic-setting.blade.php ENDPATH**/ ?>