<div class="card">
    <div class="card-header">
         <h4 class="card-title"><?php echo e(__('Theme color setting')); ?></h4>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.general.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="type" value="<?php echo e(\App\Enums\GeneralSetting::THEME_SETTING->value); ?>">
                <div class="row g-3">
                    <?php $__currentLoopData = $setting->theme_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 mb-3">
                            <label for="<?php echo e($key); ?>" class="form-label"><?php echo e(__(replaceInputTitle($key))); ?> <sup class="text-danger">*</sup></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type='text' class="input-group-text color-picker" value="<?php echo e($value); ?>"/>
                                </div>
                                <input type="text" class="form-control color-code" name="theme_setting[<?php echo e($key); ?>]" id="<?php echo e($key); ?>" value="<?php echo e($value); ?>"/>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <button class="i-btn btn--primary btn--lg"> <?php echo e(__('admin.button.save')); ?></button>
        </form>
    </div>
</div>

<?php $__env->startPush('script-push'); ?>
    <script>
        "use strict";
        const initColorPicker = (color) => {
            $('.color-picker').spectrum({
                color,
                change: function (color) {
                    $(this).parent().siblings('.color-code').val(color.toHexString().replace(/^#?/, ''));
                }
            });
        };

        const initColorCodeInput = () => {
            $('.color-code').on('input', function () {
                const color_value = $(this).val();
                $(this).parents('.input-group').find('.color-picker').spectrum({
                    color: color_value,
                });
            });
        };

        const color = $(this).data('color');
        initColorPicker(color);
        initColorCodeInput();
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/general/theme.blade.php ENDPATH**/ ?>