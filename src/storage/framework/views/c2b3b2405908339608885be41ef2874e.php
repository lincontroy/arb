<?php if(getArrayValue($setting->investment_setting, getInputName(\App\Enums\InvestmentType::INVESTMENT->name)) == 1): ?>
    <?php
        $fixedContent = \App\Services\FrontendService::getFrontendContent(\App\Enums\Frontend\SectionKey::INVESTMENT_PROFIT, \App\Enums\Frontend\Content::FIXED);
    ?>

    <div class="profit-calc-section bg-color pt-110 pb-110">
        <div class="linear-big"></div>
        <div class="container">
            <div class="row justify-content-start mb-60">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title style-two text-start mb-60">
                        <h2><?php echo e(getArrayValue($fixedContent?->meta, 'heading') ?? ''); ?></h2>
                        <p><?php echo e(getArrayValue($fixedContent?->meta, 'sub_heading') ?? ''); ?></p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="profit-calc-wrapper">
                        <form class="profit-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <label for="select_plan"><?php echo e(__('Select Plan')); ?></label>
                                        <select id="select_plan">
                                            <?php $__currentLoopData = $investments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($plan->id); ?>"
                                                        data-name="<?php echo e($plan->name); ?>"
                                                        data-interest="<?php echo e($plan->interest_rate); ?>"
                                                        data-interest_return_type="<?php echo e($plan->interest_return_type); ?>"
                                                        data-recapture_type="<?php echo e($plan->recapture_type); ?>"
                                                        data-day="<?php echo e(@$plan->timeTable->name); ?>"
                                                        data-duration="<?php echo e($plan->duration); ?>"
                                                ><?php echo e($plan->name); ?> - <?php echo e(__('Interest')); ?> <?php echo e(shortAmount($plan->interest_rate)); ?>%</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <label for="invest_amount"><?php echo e(__('Amount')); ?></label>
                                        <input type="text" id="invest_amount_item" placeholder="<?php echo e(__('Enter Amount')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="button" id="calculate_profit" class="i-btn banner-btn"><?php echo e(__('Profit Planner')); ?> <i class="bi bi-arrow-right-short"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="profit-content">
                            <h5 id="invest-total-return"></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <h4 class="text-white profit-subtitle mb-lg-5 mb-4"><?php echo e(__('Profit Calculation')); ?></h4>
                    <ul class="profit-list">
                        <li>
                            <span><?php echo e(__('Plan')); ?></span>
                            <span id="plan_name">N/A</span>
                        </li>
                        <li>
                            <span><?php echo e(__('Amount')); ?></span>
                            <span id="cal_amount">N/A</span>
                        </li>
                        <li>
                            <span><?php echo e(__('Payment Interval')); ?></span>
                            <span id="payment_interval">N/A</span>
                        </li>
                        <li>
                            <span><?php echo e(__('Profit')); ?></span>
                            <span id="profit">N/A</span>
                        </li>
                        <li>
                            <span><?php echo e(__('Capital Back')); ?></span>
                            <span id="capital_back">N/A</span>
                        </li>
                        <li>
                            <span><?php echo e(__('Total')); ?></span>
                            <span id="total_invest">N/A</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('script-push'); ?>
        <script>
            "use strict";
            $(document).ready(function() {
                var planName = "";
                var interestRate = 0;
                var day = "";
                var duration = 1;
                var recapture_type = 1;
                var interest_return_type = 2

                function updateMinMax() {
                    const selectedOption = $('#select_plan option:selected');
                    planName = selectedOption.data('name');
                    interestRate = selectedOption.data('interest');
                    day = selectedOption.data('day');
                    duration = selectedOption.data('duration');
                    recapture_type = selectedOption.data('recapture_type');
                    interest_return_type = selectedOption.data('interest_return_type');
                }

                function updateTotalReturn(amount) {
                    var parsedAmount = parseFloat(amount);
                    if (isNaN(parsedAmount)) {
                        $("#invest-total-return").text("");
                        return;
                    }

                    var currency = "<?php echo e(getCurrencySymbol()); ?>";
                    var returnAmount = parsedAmount * interestRate / 100;
                    $("#invest-total-return").text("Return "+currency + returnAmount.toFixed(2) + " Every " + day + " for " + duration + " Periods");

                    var totalProfit = returnAmount * duration;

                    if(recapture_type == 2){
                        var total = totalProfit;
                        var capitalBack = 0;
                    }else{
                        var total = totalProfit + parsedAmount;
                        var capitalBack = parsedAmount;
                    }


                    if(interest_return_type == 2){
                        var investProfit = currency+totalProfit.toFixed(2);
                        var returnType = "";
                    }else{
                        var investProfit = "LifeTime";
                        var returnType = " + " + "LifeTime";
                    }

                    $("#plan_name").text(planName);
                    $("#cal_amount").text(currency+parsedAmount.toFixed(2));
                    $("#payment_interval").text(duration + " Periods");
                    $("#profit").text(investProfit);
                    $("#capital_back").text(currency+capitalBack.toFixed(2));
                    $("#total_invest").text(currency+total.toFixed(2) + returnType);
                }

                updateMinMax();

                $('#select_plan').change(function() {
                    updateMinMax();
                });

                $('#calculate_profit').click(function() {
                    var amount = $('#invest_amount_item').val();
                    updateTotalReturn(amount);
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/default_theme/component/investment-profit-calculation.blade.php ENDPATH**/ ?>