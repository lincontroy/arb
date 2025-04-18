<?php $__env->startSection('panel'); ?>
    <section>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo e($setTitle); ?></h4>
            </div>
            <div class="card-body pt-0">
                <div class="notification-items" data-simplebar>
                    <div class="notification-item">
                        <ul class="all-notification-list">
                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="py-3 px-3">
                                    <a href="<?php echo e(getArrayValue($notification->data, 'url')); ?>">
                                        <div class="notification-item-content">
                                            <h6 class="mb-2 fs-14">Cristina Pride <small class="primary--light text--muted fw-normal ms-2 py-1 px-2 bg--light rounded-2"><?php echo e(diffForHumans($notification->created_at)); ?></small></h6>
                                            <p class="text--light"><?php echo e(getArrayValue($notification->data, 'message')); ?></p>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4"><?php echo e($notifications->links()); ?></div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/notification.blade.php ENDPATH**/ ?>