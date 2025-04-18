<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php echo e(__($setTitle)); ?></h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.general.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type" value="<?php echo e(\App\Enums\GeneralSetting::SYSTEM_CONFIGURATION->value); ?>">
                    <?php $__currentLoopData = $setting->system_configuration; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="list-group">
                            <li class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-3 justify-content-between align-items-center bg--light border-0">
                                <div>
                                    <h6 class="mb-0"><?php echo e((__(replaceInputTitle($key)))); ?></h6>
                                    <p><?php echo e(getArrayValue($value, 'title')); ?></p>
                                </div>

                                <div>
                                    <label class="custom--switch" for="<?php echo e($key); ?>">
                                        <input <?php echo e(getArrayValue($value, 'value')  == App\Enums\Status::ACTIVE->value ? 'checked' : ''); ?>

                                        type="checkbox"
                                        name="system_configuration[<?php echo e($key); ?>][value]"
                                        class="default_status"
                                        id="<?php echo e($key); ?>"
                                        value="1">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <button class="i-btn btn--primary btn--lg"> <?php echo e(__('Submit')); ?></button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/configuration.blade.php ENDPATH**/ ?>