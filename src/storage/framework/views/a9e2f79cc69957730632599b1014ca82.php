<?php $__env->startSection('content'); ?>
    <main>
        <div class="trading-section pt-5 pb-110">
            <div class="container i-container">
                <div class="row g-4">
                    <div class="col-xl-9">
                        <div class="market-graph">
                            <div class="mb-5">
                                <?php echo $__env->make('user.partials.trade.trading-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <?php echo $__env->make('user.partials.trade.binary-trade', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-12">
                    <?php echo $__env->make('user.partials.trade.trade-log', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-push'); ?>
    <script>
        'use strict';
        $(document).ready(function() {
            $("#amount").on('keyup', function() {
                const inputAmount = parseFloat($(this).val());
                const commissionPercentage = <?php echo e(getArrayValue($setting->commissions_charge, 'binary_trade_commissions', 0)); ?>;

                if (isNaN(inputAmount)) {
                    $("#profit_amount").text('+' + 0.00);
                    return;
                }

                const profit = (commissionPercentage / 100) * inputAmount;
                const withProfitAmount = parseFloat(inputAmount) + parseFloat(profit);

                $("#profit_amount").text('+' + withProfitAmount.toFixed(2));
            });
        });
    </script>
<?php $__env->stopPush(); ?>







<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/user/trade/trading.blade.php ENDPATH**/ ?>