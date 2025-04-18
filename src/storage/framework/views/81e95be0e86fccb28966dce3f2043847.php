<?php $__env->startSection('content'); ?>
    <div class="main-content" data-simplebar>
        <div class="row">
            <div class="col-lg-12">
                <div class="i-card-sm mb-4">
                    <div class="card-header">
                        <h4 class="title"><?php echo e(__($setTitle)); ?></h4>
                    </div>

                    <div class="table-container">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo e(__('Pair')); ?></th>
                                    <th scope="col"><?php echo e(__('Price')); ?></th>
                                    <th scope="col"><?php echo e(__('Market Cap')); ?></th>
                                    <th scope="col"><?php echo e(__('Daily High')); ?></th>
                                    <th scope="col"><?php echo e(__('Daily Low')); ?></th>
                                    <th scope="col"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $cryptoCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $crypto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-label="<?php echo e(__('Pair')); ?>">
                                        <div class="name d-flex align-items-center justify-content-md-start justify-content-end gap-lg-3 gap-2">
                                            <div class="icon">
                                                <img src="<?php echo e($crypto->file); ?>" class="avatar--sm" alt="<?php echo e(__('Crypto-Image')); ?>">
                                            </div>
                                            <div class="content">
                                                <h6 class="fs-14"><?php echo e($crypto->pair); ?></h6>
                                                <span class="fs-13 text--light"><?php echo e($crypto->name); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="<?php echo e(__('Price')); ?>">
                                        $<?php echo e(getArrayValue($crypto->meta, 'current_price')); ?>

                                    </td>
                                    <td data-label="<?php echo e(__('Market Cap')); ?>">
                                        <?php echo e(getArrayValue($crypto->meta, 'market_cap')); ?>

                                    </td>
                                    <td data-label="<?php echo e(__('Daily High')); ?>">
                                        <?php echo e(getArrayValue($crypto->meta, 'high_24h')); ?> %
                                    </td>
                                    <td data-label="<?php echo e(__('Daily Low')); ?>">
                                        <?php echo e(getArrayValue($crypto->meta, 'low_24h')); ?> %
                                    </td>
                                    <td data-label="<?php echo e(__('Action')); ?>">
                                        <?php if(getArrayValue($setting->system_configuration, 'binary_trade.value') == \App\Enums\Status::ACTIVE->value): ?>
                                            <a href="<?php echo e(route('user.trade.binary', $crypto->crypto_id)); ?>" class="i-btn btn--sm btn--primary capsuled"><?php echo e(__('Trade')); ?></a>
                                        <?php endif; ?>
                                        <?php if(getArrayValue($setting->system_configuration, 'practice_trade.value') == \App\Enums\Status::ACTIVE->value): ?>
                                            <a href="<?php echo e(route('user.trade.practice', $crypto->crypto_id)); ?>" class="i-btn btn--sm btn--primary-outline capsuled"><?php echo e(__('Practice')); ?></a>
                                        <?php endif; ?>
                                        <?php if(getArrayValue($setting->system_configuration, 'binary_trade.value') != \App\Enums\Status::ACTIVE->value && getArrayValue($setting->system_configuration, 'practice_trade.value') != \App\Enums\Status::ACTIVE->value): ?>
                                            <span><?php echo e(__('N/A')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4"><?php echo e($cryptoCurrency->links()); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/user/trade/index.blade.php ENDPATH**/ ?>