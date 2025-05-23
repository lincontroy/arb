<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="mainContent" class="main_content">
        <?php echo $__env->make('admin.partials.top-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard_container">
            <?php echo $__env->yieldContent('panel'); ?>
        </div>
        <footer>
            <div class="footer-content">
                <p><?php echo e(__(getArrayValue($setting->appearance, 'copy_right_text'))); ?></p>
                <div class="footer-right">
                    <ul>
                        <li><a href="https://support.kloudinnovation.com/" target="_blank"><?php echo e(__('Support')); ?></a></li>
                    </ul>
                    <span><?php echo e(__('App-Version')); ?>: <?php echo e(config('app.app_version')); ?></span>
                </div>
            </div>
        </footer>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/layouts/main.blade.php ENDPATH**/ ?>