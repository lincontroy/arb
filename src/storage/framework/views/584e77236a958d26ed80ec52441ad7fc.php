
<?php $__env->startSection('content'); ?>
    <div class="installer-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <?php echo $__env->make('installer.partials.top-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="installer-wrapper bg--light account-setup-step">
                        <div class="i-card-md">
                            <div class="row text-center">
                                <div class="col-lg-4">
                                    <a href="<?php echo e(url('admin')); ?>" class="ai--btn i-btn btn--md btn--primary">Admin Login</a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="<?php echo e(url('login')); ?>" class="ai--btn i-btn btn--md btn--success">User Login</a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="<?php echo e(url('/')); ?>" class="ai--btn i-btn btn--md btn--info">Frontend</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/installer/success.blade.php ENDPATH**/ ?>