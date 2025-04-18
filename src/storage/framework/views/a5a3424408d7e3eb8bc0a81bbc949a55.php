<?php $__env->startSection('panel'); ?>
    <section>
        <?php echo $__env->make('admin.partials.filter', [
            'is_filter' => false,
            'is_modal' => false,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            <div class="card-body">
                <form id="setting-form" action="<?php echo e(route('admin.general.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="type" value="<?php echo e(\App\Enums\GeneralSetting::COMMISSION_CHARGE->value); ?>">
                    <div class="row g-3">
                            <?php $__currentLoopData = $setting->commissions_charge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 mb-3">
                                    <label for="<?php echo e($key); ?>" class="form-label"><?php echo e(__(replaceInputTitle($key))); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="commissions_charge[<?php echo e($key); ?>]" value="<?php echo e($value); ?>" id="<?php echo e($key); ?>"  placeholder="<?php echo e(__('Enter ') . __(replaceInputTitle($key))); ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                        <span class="input-group-text" id="basic-addon2"><?php echo e($key == 'trade_practice_balance' ? getCurrencyName() : '%'); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <button class="i-btn btn--primary btn--lg"> <?php echo e(__('Submit')); ?></button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/commissions_charge.blade.php ENDPATH**/ ?>