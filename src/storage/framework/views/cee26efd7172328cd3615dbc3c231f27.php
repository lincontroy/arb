<div class=" scroll-design">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th><?php echo e(__('Initiated At')); ?></th>
                    <th><?php echo e(__('Amount')); ?></th>
                    <th><?php echo e(__('Volume')); ?></th>
                    <th><?php echo e(__('Price')); ?></th>
                    <th><?php echo e(__('Type')); ?></th>
                    <th><?php echo e(__('Outcome')); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $tradeLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tradeKey => $tradeLog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td data-label="Initiated At"><?php echo e(diffForHumans($tradeLog->created_at)); ?></td>
                    <td data-label="<?php echo e(__('Amount')); ?>">
                        <?php if($tradeLog->outcome == \App\Enums\Trade\TradeOutcome::WIN->value): ?>
                            <?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($tradeLog->amount)); ?>

                            +
                            <?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($tradeLog->winning_amount)); ?>

                            =
                            <?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($tradeLog->amount + $tradeLog->winning_amount)); ?>

                        <?php elseif($tradeLog->outcome == \App\Enums\Trade\TradeOutcome::LOSE->value): ?>
                           <?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($tradeLog->amount)); ?>

                        <?php else: ?>
                            <?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($tradeLog->amount)); ?>

                        <?php endif; ?>
                    </td>
                    <td data-label="Volume">
                        <span class="i-badge <?php echo e(\App\Enums\Trade\TradeVolume::getColor($tradeLog->volume)); ?>">
                            <?php echo e(\App\Enums\Trade\TradeVolume::getName($tradeLog->volume)); ?>

                        </span>
                    </td>
                    <td data-label="Price">$<?php echo e(shortAmount($tradeLog->original_price)); ?></td>
                    <td data-label="Outcome">
                        <span class="i-badge <?php echo e(\App\Enums\Trade\TradeType::getColor($tradeLog->type)); ?>"><?php echo e(\App\Enums\Trade\TradeType::getName($tradeLog->type)); ?></span>
                    </td>
                    <td data-label="Outcome">
                        <span class="i-badge <?php echo e(\App\Enums\Trade\TradeOutcome::getColor($tradeLog->outcome)); ?>"><?php echo e(\App\Enums\Trade\TradeOutcome::getName($tradeLog->outcome)); ?></span>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td class="text-white text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/user/partials/trade/trade-log.blade.php ENDPATH**/ ?>