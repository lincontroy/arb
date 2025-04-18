<?php if(getArrayValue($setting->investment_setting, getInputName(\App\Enums\InvestmentType::INVESTMENT->name)) == 1): ?>
    <?php
        $fixedContent = \App\Services\FrontendService::getFrontendContent(\App\Enums\Frontend\SectionKey::PRICING_PLAN, \App\Enums\Frontend\Content::FIXED);
    ?>

    <div class="pricing-section pt-110 pb-110">
        <div class="container">
            <div class="row justify-content-lg-start justify-content-center align-items-center g-4 mb-60">
                <div class="col-lg-5">
                    <div class="section-title text-lg-start text-center">
                        <h2><?php echo e(getArrayValue($fixedContent?->meta, 'heading')); ?></h2>
                        <p> <?php echo e(getArrayValue($fixedContent?->meta, 'sub_heading')); ?> </p>
                    </div>
                </div>
            </div>
            <div>
                <?php echo $__env->make('user.partials.investment.plan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('user.partials.investment.plan_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/default_theme/component/pricing_plan.blade.php ENDPATH**/ ?>