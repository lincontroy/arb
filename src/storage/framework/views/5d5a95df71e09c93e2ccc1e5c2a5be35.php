<?php $__env->startSection('panel'); ?>
    <section>
        <div class="container-fluid p-0">
            <form action="<?php echo e(route('admin.investment.setting.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <?php $__currentLoopData = \App\Enums\InvestmentType::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commissionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                <div class="card-header bg--primary">
                                    <h4 class="card-title text-white"><?php echo e(replaceInputTitle($commissionType->name)); ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <select class="form-select" name="type[<?php echo e(getInputName($commissionType->name)); ?>]">
                                            <option value="1" <?php if(getArrayValue($setting->investment_setting, getInputName($commissionType->name)) == 1): ?> selected <?php endif; ?>><?php echo e(__('ON')); ?></option>
                                            <option value="0" <?php if(getArrayValue($setting->investment_setting, getInputName($commissionType->name)) == 0): ?> selected <?php endif; ?>><?php echo e(__('OFF')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button class="i-btn btn--primary btn--md"><?php echo e(__('admin.button.save')); ?></button>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/investment/setting.blade.php ENDPATH**/ ?>