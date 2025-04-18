<div class="card">
    <div class="card-header">
        <p><?php echo e(__("Clear your browser cache if the logo and favicon don't update after changes on this page. If the issue persists, consider clearing server and network-level caches too.")); ?></p>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.general.logo.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row align-items-center g-lg-3 g-2">
                <div class="col-lg-4 col-md-6 mb-3">
                    <label for="dark" class="form-label"><?php echo e(__('Dark Background Logo')); ?></label>
                    <input type="file" name="dark" class="form-control" id="dark">
                    <small><?php echo e(__('File formats supported: jpeg, jpg, png.')); ?>

                        <a href="<?php echo e(displayImage(getArrayValue($setting->logo, 'dark'))); ?>" target="__blank"><?php echo e(__('view logo')); ?></a>
                    </small>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <label for="white" class="form-label"><?php echo e(__('White Background Logo')); ?></label>
                    <input type="file" name="white" class="form-control" id="white">
                    <small><?php echo e(__('File formats supported: jpeg, jpg, png.')); ?>

                        <a href="<?php echo e(displayImage(getArrayValue($setting->logo, 'white'))); ?>" target="__blank"><?php echo e(__('view logo')); ?></a>
                    </small>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <label for="favicon" class="form-label"><?php echo e(__('Favicon')); ?></label>
                    <input type="file" name="favicon" class="form-control" id="favicon">
                    <small><?php echo e(__('File formats supported: jpeg, jpg, png.')); ?>

                        <a href="<?php echo e(displayImage(getArrayValue($setting->logo, 'favicon'))); ?>" target="__blank"><?php echo e(__('view favicon')); ?></a>
                    </small>
                </div>
            </div>

            <button class="i-btn btn--primary btn--lg"> <?php echo e(__('admin.button.save')); ?></button>
        </form>
    </div>
</div>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/general/logo.blade.php ENDPATH**/ ?>