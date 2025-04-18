<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo e(__('Seo Settings')); ?></h4>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.general.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="type" value="<?php echo e(\App\Enums\GeneralSetting::SEO_SETTING->value); ?>">
                <div class="row g-3">
                    
                    <?php $__currentLoopData = $setting->seo_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key == 'description'): ?>
                            <div class="col-lg-6 mb-3">
                                <label for="<?php echo e($key); ?>" class="form-label"><?php echo e(__($key)); ?> <sup class="text-danger">*</sup></label>
                                <textarea class="form-control" id="<?php echo e($key); ?>" name="seo_setting[<?php echo e($key); ?>]" required> <?php echo e($value); ?></textarea>
                            </div>
                        <?php elseif($key == 'keywords'): ?>
                            <div class="col-lg-6 mb-3">
                                <label for="<?php echo e($key); ?>" class="form-label"><?php echo e(__($key)); ?> <sup class="text-danger">*</sup></label>
                                <select class="form-select keywords" id="<?php echo e($key); ?>" name="seo_setting[<?php echo e($key); ?>][]" multiple="multiple" required>
                                    <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data); ?>" selected><?php echo e($data); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php elseif($key == 'image'): ?>
                            <div class="col-lg-6 mb-3">
                                <label for="<?php echo e($key); ?>" class="form-label"><?php echo e(__(replaceInputTitle($key))); ?> <sup class="text-danger">*</sup></label>
                                <input type="file" name="seo_setting[<?php echo e($key); ?>]"  value="<?php echo e($value); ?>" class="form-control" id="<?php echo e($key); ?>">
                                 <small><?php echo e(__('File formats supported: jpeg, jpg, png. The image will be resized to 1920 x 1080 pixels')); ?>.
                                    <a href="<?php echo e(displayImage($value)); ?>" target="_blank"><?php echo e(__('view image')); ?></a>
                                </small>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-6 mb-3">
                                <label for="<?php echo e($key); ?>" class="form-label"><?php echo e(__(replaceInputTitle($key))); ?> <sup class="text-danger">*</sup></label>
                                <input type="text" name="seo_setting[<?php echo e($key); ?>]"  value="<?php echo e($value); ?>" class="form-control" id="<?php echo e($key); ?>" required>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <button class="i-btn btn--primary btn--lg"> <?php echo e(__('admin.button.save')); ?></button>
        </form>
    </div>
</div>

<?php $__env->startPush('script-push'); ?>
    <script>
        "use strict";
        $('.keywords').select2({
            tags: true,
            tokenSeparators: [',']
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/general/seo.blade.php ENDPATH**/ ?>