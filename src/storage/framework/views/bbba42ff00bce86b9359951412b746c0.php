<?php $__env->startSection('content'); ?>
    <div class="main-content" data-simplebar>
        <div class="row">
            <div class="col-lg-12">
                <div class="i-card-sm">
                    <div class="card-header">
                        <h4 class="title"><?php echo e(__($setTitle)); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo $__env->make('user.partials.matrix.commission', [
                                    'commissions' => $commissions,
                                    'type' => \App\Enums\CommissionType::REFERRAL->value,
                                    'route' => route('user.commission.index'),
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4"><?php echo e($commissions->links()); ?></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/user/commissions/index.blade.php ENDPATH**/ ?>