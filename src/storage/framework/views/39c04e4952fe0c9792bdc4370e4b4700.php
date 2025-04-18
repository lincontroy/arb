<?php
    $fixedCryptoCoinContent = \App\Services\FrontendService::getFrontendContent(\App\Enums\Frontend\SectionKey::CRYPTO_COIN, \App\Enums\Frontend\Content::FIXED);
?>


<?php $__env->startSection('content'); ?>
    <main>
        <div class="form-section white img-adjust">
            <div class="linear-center"></div>
            <div class="container-fluid px-0">
                <div class="row justify-content-center align-items-center gy-5">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 col-sm-10 position-relative">
                        <div class="eth-icon">
                            <img src="<?php echo e(displayImage(getArrayValue($fixedCryptoCoinContent?->meta, 'first_crypto_coin'), "450X450")); ?>" alt="image">
                        </div>
                        <div class="bnb-icon">
                            <img src="<?php echo e(displayImage(getArrayValue($fixedCryptoCoinContent?->meta, 'second_crypto_coin'), "450X450")); ?>" alt="image">
                        </div>
                        <div class="ada-icon">
                            <img src="<?php echo e(displayImage(getArrayValue($fixedCryptoCoinContent?->meta, 'third_crypto_coin'), "450X450")); ?>" alt="image">
                        </div>
                        <div class="sol-icon">
                            <img src="<?php echo e(displayImage(getArrayValue($fixedCryptoCoinContent?->meta, 'fourth_crypto_coin'), "450X450")); ?>" alt="image">
                        </div>

                        <div class="form-wrapper">
                            <p><?php echo e(__("Thanks for signing up! Please verify your email by clicking the link we just sent. If you didn't receive it, we'll gladly send another")); ?></p>
                            <?php if(session('status') == 'verification-link-sent'): ?>
                                <div class="mb-4 mt-2 text-success">
                                    <?php echo e(__('New verification link sent to your registered email')); ?>

                                </div>
                            <?php endif; ?>

                            <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="i-btn btn--lg btn--primary w-100" type="submit"><?php echo e(__('Resend Verification Email')); ?></button>
                                    </div>
                                </div>
                            </form>
                            <div class="have-account">
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <?php echo e(__('Log Out')); ?>

                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>