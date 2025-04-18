<?php $__env->startSection('panel'); ?>
    <section>
        <div class="row align-items-start g-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo e(__($setTitle)); ?></h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.theme.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="theme" class="form-label"><?php echo e(__('Select Active Theme')); ?></label>
                                <select class="form-select" id="theme" name="theme">
                                    <?php $__currentLoopData = getArrayValue($setting->theme_template_setting, 'themes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e($key == getArrayValue($setting->theme_template_setting, 'currently_active') ? 'selected' : ''); ?>>
                                            <?php echo e($theme['title'] ?? 'Default Theme'); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <button class="i-btn btn--primary btn--lg"> <?php echo e(__('Update Theme')); ?></button>
                        </form>

                        <div class="mt-5">
                            <h5 class="text-secondary">Available Themes:</h5>
                            <div class="row">
                                <?php $__currentLoopData = getArrayValue($setting->theme_template_setting, 'themes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6">
                                        <div class="card mb-3 shadow-sm <?php echo e($key == getArrayValue($setting->theme_template_setting, 'currently_active') ? 'border-primary' : ''); ?>">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><?php echo e($theme['title']); ?></h5>
                                                <p class="card-text text-muted"><?php echo e($theme['details']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/theme.blade.php ENDPATH**/ ?>