<div class="d-flex align-items-center justify-content-between gap-3 mb-3">
    <div class="card--title mb-0">
        <h5 class="mb-0"><?php echo e(__('Rise/Fall')); ?></h5>
    </div>
    <a href="<?php echo e(route('user.dashboard')); ?>" class="i-btn btn--primary btn--md capsuled"><i class="bi bi-chevron-left me-1"></i><?php echo e(__('Dashboard')); ?></a>
</div>
<div class="market-widget mb-4">
    <form method="POST" action="<?php echo e(route('user.trade.store', $crypto->id)); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" value="<?php echo e(request()->routeIs('user.trade.practice') ? \App\Enums\Trade\TradeType::PRACTICE->value : \App\Enums\Trade\TradeType::TRADE->value); ?>" name="type">
        <div class="input-single">
            <label for="amount"><?php echo e(__('Amount')); ?></label>
            <input type="text" id="amount" name="amount" value="<?php echo e(old('amount')); ?>" placeholder="0.00" required>
        </div>

        <div class="input-single">
            <label for="parameter"><?php echo e(__('Expiry Time')); ?></label>
            <select type="text" id="parameter" name="parameter_id" required>
                <option value=""><?php echo e(__('Select Expiration Time')); ?></option>
                <?php $__currentLoopData = $parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $parameter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($parameter->id); ?>">
                        <?php echo e(__('Time')); ?>: <?php echo e($parameter->time.' ' .\App\Enums\Trade\TradeParameterUnit::getName($parameter->unit)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="profit-card">
            <div class="percent">
                <span id="profit_amount">+0.00</span>
                <sub> / <?php echo e(getArrayValue($setting->commissions_charge, 'binary_trade_commissions', 0)); ?> %</sub>
            </div>
            <p><?php echo e(__('Profit')); ?></p>
        </div>
        <div class="d-flex justify-content-center align-items-center gap-3">
            <button type="submit" name="volume" value="<?php echo e(\App\Enums\Trade\TradeVolume::HIGH->value); ?>" class="i-btn btn--md btn--success capsuled w-100"><?php echo e(__(\App\Enums\Trade\TradeVolume::getName(\App\Enums\Trade\TradeVolume::HIGH->value))); ?> <i class="bi bi-arrow-up"></i></button>
            <button type="submit" name="volume" value="<?php echo e(\App\Enums\Trade\TradeVolume::LOW->value); ?>" class="i-btn btn--md btn--danger capsuled w-100"><?php echo e(__(\App\Enums\Trade\TradeVolume::getName(\App\Enums\Trade\TradeVolume::LOW->value))); ?> <i class="bi bi-arrow-down"></i></button>
        </div>
    </form>
</div>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/user/partials/trade/binary-trade.blade.php ENDPATH**/ ?>