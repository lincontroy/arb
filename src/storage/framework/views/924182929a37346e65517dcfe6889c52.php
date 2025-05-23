<?php
    $fixedContent = \App\Services\FrontendService::getFrontendContent(\App\Enums\Frontend\SectionKey::FAQ, \App\Enums\Frontend\Content::FIXED);
    $enhancementContents = \App\Services\FrontendService::getFrontendContent(\App\Enums\Frontend\SectionKey::FAQ, \App\Enums\Frontend\Content::ENHANCEMENT);
?>

<div class="faq-section position-relative pt-110 pb-110">
    <div class="linear-right"></div>
    <div class="container">
        <div class="row align-items-start gy-5">
            <div class="col-xl-5 text-start pe-lg-5">
                <div class="section-title mb-60">
                    <h2><?php echo e(getArrayValue($fixedContent?->meta, 'heading')); ?></h2>
                    <p><?php echo e(getArrayValue($fixedContent?->meta, 'sub_heading')); ?></p>
                </div>
                <a href="<?php echo e(getArrayValue($fixedContent?->meta, 'btn_url')); ?>" class="i-btn btn--primary btn--lg capsuled"><?php echo e(getArrayValue($fixedContent?->meta, 'btn_name')); ?></a>
                <div class="bet-vecotr style-two">
                    <img src="<?php echo e(displayImage(getArrayValue($fixedContent?->meta, 'bg_image'), "385x278")); ?>" alt="<?php echo e(__('Vector image')); ?>">
                </div>
            </div>
            <div class="col-xl-7">
                <div class="faq-wrap style-border">
                    <div class="accordion" id="accordionExample">
                        <?php $__currentLoopData = $enhancementContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enhancementContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-<?php echo e($loop->iteration); ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($loop->iteration); ?>" aria-expanded="true" aria-controls="collapse-<?php echo e($loop->iteration); ?>">
                                        <?php echo e(getArrayValue($enhancementContent->meta, 'question')); ?>

                                    </button>
                                </h2>
                                <div id="collapse-<?php echo e($loop->iteration); ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo e($loop->iteration); ?>">
                                    <div class="accordion-body">
                                        <p><?php echo e(getArrayValue($enhancementContent->meta, 'answer')); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/default_theme/component/faq.blade.php ENDPATH**/ ?>